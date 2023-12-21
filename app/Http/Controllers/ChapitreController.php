<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ChapitreController extends Controller {

    public function create($id) : View
    {
        $monHistoire = Histoire::find($id);
        $chap = $monHistoire->chapitres()->where('premier', 1)->first();
        return view('histoire.createChapitre', ['id' => $id, 'affichePremier' => $chap]);
    }

    public function store(Request $request)
    {
        {
            $validator = Validator::make($request->all(), [
                'titre' => 'required',
                'titrecourt' => 'required',
                'texte' => 'required',
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
            $chapitre = new Chapitre();

            $chapitre->titre = $request->titre;
            $chapitre->titrecourt = $request->titrecourt;
            $chapitre->texte = $request->texte;
            $chapitre->histoire_id = $request->histoire_id;

            if (!empty($request->media)) $chapitre->media = $request->media;
            if (!empty($request->question)) $chapitre->question = $request->question;

            if (isset($request->premier)){
                $chapitre->premier = true;
            }
            else {$chapitre->premier = false;
            }
            // insertion de l'enregistrement dans la base de données
            $chapitre->save();

            return redirect()->route('encours', $chapitre->histoire_id)
                ->with('type', 'success')
                ->with('text', 'Chapitre ajoutée avec succès');
        }
    }

    public function link(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'origine' => 'required|exists:chapitres,id',
            'destination' => 'required|exists:chapitres,id',
            'reponse' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('encours',$id)
                ->withErrors($validator)
                ->withInput()
                ->with('type', 'error')
                ->with('text', 'Formulaire KO');
        }
        $chapitre_src = Chapitre::find($request->input('origine'));
        $chapitre_src->suivants()->attach($request->input('destination'), ['reponse' =>$request->input('reponse') ]);

        return redirect()->route('encours', $id)
            ->with('type', 'success')
            ->with('text', 'Lien ajouté avec succès');
    }
}
