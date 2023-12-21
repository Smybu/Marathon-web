<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class HistoireController extends Controller
{
    public function show(int $id): View
    {
        $histoire = Histoire::find($id);
        return view('histoire.show', ["histoire" => $histoire]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('histoire.create', ["genres" => $genres]);
    }

    public function store(Request $request)
    {
        {
            $validator = Validator::make($request->all(), [
                'titre' => 'required',
                'pitch' => 'required',
                'photo' => 'required',

            ]);

            if ($validator->fails()) {
                return redirect()->route('histoire.create')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('type', 'error')
                    ->with('text', 'Formulaire KO');
            }

            // A partir d'ici le code est exécuté uniquement si les données sont validaées
            // par la méthode validate()
            // sinon un message d'erreur est renvoyé vers l'utilisateur

            // préparation de l'enregistrement à stocker dans la base de données
            $histoire = new Histoire();

            $histoire->titre = $request->titre;
            $histoire->pitch = $request->pitch;
            $histoire->photo = $request->photo;
            $histoire->user_id = Auth::user()->id;
            $histoire->genre_id = $request->genre;

            if (isset($request->active)){
                $histoire->active = true;
            }
            else {$histoire->active = false;
            }

            // insertion de l'enregistrement dans la base de données
            $histoire->save();

            // redirection vers la page qui affiche la liste des tâches
            return redirect()->route('create-chapitre', $histoire->id)
                ->with('type', 'success')
                ->with('text', 'Histoire ajoutée avec succès');
        }
    }

    public function encours($id) {
        $histoire = Histoire::findOrFail($id);
        return view("histoire.encours", compact('histoire'));
    }
}



