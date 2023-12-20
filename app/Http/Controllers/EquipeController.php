<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;

class EquipeController extends Controller
{
    public function index(){
        $equipe= [
            'nomEquipe'=>"AirMess",
            'logo'=>"resources/images/logo/pantheon_logo_blanc.png",
            'slogan'=>"Les aventures des temps anciens",
            'localisation'=>"002X",
            'membres'=> [
                [ 'nom'=>"Dubo",'prenom'=>"Batiste", 'image'=>"#", 'fonctions'=>["validateur","développer"] ],
                [ 'nom'=>"Waeles",'prenom'=>"Swann", 'image'=>"#", 'fonctions'=>["développer"] ],
                [ 'nom'=>"Goudaillier",'prenom'=>"Antoine", 'image'=>"#", 'fonctions'=>["développer"] ],
                [ 'nom'=>"Dauchy",'prenom'=>"Esteban", 'image'=>"#", 'fonctions'=>["développer"] ],
                [ 'nom'=>"Hazebrouck",'prenom'=>"Thomas", 'image'=>"#", 'fonctions'=>["concepteur"] ],
                [ 'nom'=>"Hueso-Guerrero",'prenom'=>"Henri", 'image'=>"#", 'fonctions'=>["concepteur"] ],
                [ 'nom'=>"Torres",'prenom'=>"Coline", 'image'=>"#", 'fonctions'=>["concepteur"] ],
                [ 'nom'=>"Parrein",'prenom'=>"Charles", 'image'=>"#", 'fonctions'=>["concepteur"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipe.index', ['equipe' => $equipe]);
    }
}
