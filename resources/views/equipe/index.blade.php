@vite(['resources/css/equipe.css'])

@extends('templates.app')

@section('title', 'AirMess')

@section('content')
<section>
    <img src="{{Vite::asset($equipe['logo'])}}" alt="Logo AirMess">
    <h1>{{$equipe['nomEquipe']}}</h1>
    <h3>{{$equipe['slogan']}}</h3>

    <p>Nous étions en salle {{$equipe['localisation']}}</p>

    <p>Voici la liste des membres de l'équipe</p>
    <ul>
        @foreach($equipe['membres'] as $membre)
            <li>{{$membre['nom']}} {{$membre['prenom']}}, @foreach($membre['fonctions'] as $fonction) {{$fonction}} @endforeach</li>
        @endforeach
    </ul>
</section>
@endsection