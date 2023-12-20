<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HistoireController extends Controller
{
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

        return redirect()->route('histoire.show', ['histoire' => $newHistoire])
            ->with('type', 'primary')
            ->with('msg', 'Histoire ajoutée avec succès');

    }
}
