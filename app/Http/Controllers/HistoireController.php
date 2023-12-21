<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HistoireController extends Controller
{
    public function index(Request $request){
        $reset = $request->query('reset', null);
        if (isset($reset)) {
            Cookie::expire('g');
            return redirect()->route('histoire.index');
        }

        $g = $request->input('g', null);
        $category = $request->query('g', 'all');
        $cookieG = $request->cookie('g', null);


        if ($category !== 'all') {
            Cookie::queue('g', $category, 10);
        }

        if (!isset($g)) {
            if (!isset($cookieG)) {
                $histoires = Histoire::all();
                $g = 'All';
                Cookie::expire('g');
            } else {
                $histoires = Histoire::whereHas('genre', function($q) use ($cookieG){
                    $q->where('label', $cookieG);
                })->get();
                $g = $cookieG;
                Cookie::queue('g', $g, 10);
            }
        } else {
            if ($g == 'All') {
                $histoires = Histoire::all();
                Cookie::expire('g');
            } else {
                $histoires =Histoire::whereHas('genre', function($q) use ($g){
                    $q->where('label', $g);
                })->get();;
                Cookie::queue('g', $g, 10);
            }
        }
        $genres = Genre::distinct('label')->pluck('label');

        return view('histoire.index', [
            'histoires' => $histoires,
            'g' => $g,
            'genres' => $genres,
            'category' => $category,
        ]);

    }

    public function show(int $id) : View
    {
        $histoire = Histoire::find($id);
        return view('histoire.show', ["histoire" => $histoire]);
    }

    public function create() : View
    {
        return view('histoire.create', ["genres" => Genre::all()]);
    }

    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'pitch' => 'required',
            'genre' => 'required|exists:genres,id',
            'photo' => 'required',
            'actif' => 'boolean',
        ]);

        // Récupérez le fichier à partir de la requête
        $file = $request->file('photo');

        // Créez le nom de fichier en utilisant le titre et l'extension d'origine
        $customFileName = $validated['titre'] . '.' . $file->getClientOriginalExtension();

        // Stockez le fichier dans le dossier 'images' du disque 'public' avec le nom généré
        $path = $file->storeAs('images', $customFileName, 'public');

        // Maintenant, $path contient le chemin du fichier stocké

        // Ajoutez le chemin du fichier à vos données validées
        $validated['photo_link'] = $path;

        // Si la case à cocher "actif" n'est pas cochée, définissez sa valeur sur false par défaut
        $validated['active'] = $request->has('active');

        $newHistoire = Histoire::create([
            'titre' => $validated['titre'],
            'pitch' => $validated['pitch'],
            'genre_id' => $validated['genre'],
            'photo' => $validated['photo_link'],
            'active' => $validated['active'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('create-chapitre', ['histoire' => $newHistoire])
            ->with('type', 'primary')
            ->with('msg', 'Histoire ajoutée avec succès');

    }

    public function encours($id) {
        $histoire = Histoire::findOrFail($id);
        return view("histoire.encours", compact('histoire'));
    }

    public function edit(int $id) : View
    {
        $histoire = Histoire::find($id);
        return view('histoire.edit', ["histoire" => $histoire, "genres" => Genre::all()]);
    }

    public function update(Request $request, int $id) : RedirectResponse
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'pitch' => 'required',
            'genre' => 'required|exists:genres,id',
            'photo' => 'nullable',
            'active' => 'boolean',
        ]);

        $histoire = Histoire::find($id);

        if ($request->hasFile('photo') && $request->file('photo')->isValid())
        {
            $file = $request->file('photo');
            Storage::delete($histoire->photo);
            $customFileName = $validated['titre'] . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images', $customFileName, 'public');
            $histoire->photo = $path;
        }

        $histoire->titre = $validated['titre'];
        $histoire->pitch = $validated['pitch'];
        $histoire->genre_id = $validated['genre'];
        $histoire->active = $validated['active'];
        $histoire->save();

        return redirect()->route('histoire.show', ['histoire' => $histoire])
            ->with('type', 'primary')
            ->with('msg', 'Histoire modifiée avec succès');
    }

    public function destroy(int $id) : RedirectResponse
    {
        $histoire = Histoire::find($id);
        Storage::delete($histoire->photo);
        $histoire->delete();
        return redirect()->route('histoire.index')
            ->with('type', 'primary')
            ->with('msg', 'Histoire supprimée avec succès');
    }

    public function add_avis(Request $request): RedirectResponse
    {
        $histoire = Histoire::find($request->id);
        $contenu = $request->input('contenu');
        $user_id = auth()->id();
        $histoire->add_avis($contenu, $user_id, $histoire->id);
        return redirect()->route('histoire.show', ['histoire' => $histoire->id]);
    }

    public function delete_avis(Request $request): RedirectResponse
    {
        $histoire = Histoire::find($request->histoire_id);
        $avis_id = $request->avis_id;
        $histoire->delete_avis($avis_id);
        return redirect()->route('histoire.show', ['histoire' => $histoire->id]);
    }
}



