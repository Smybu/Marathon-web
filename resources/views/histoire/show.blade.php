@extends('templates.app')

@section('title', $histoire->titre)

@section('content')
<section id="histoire_show">
    @if($histoire->active || auth()->id() == $histoire->user_id)
        <div id="head_histoire">
            @if(str_starts_with($histoire->photo, 'https:') || str_starts_with($histoire->photo, 'http'))
                <img src="{{$histoire->photo}}" alt="Image {{$histoire->titre}}">
            @else
                <img src="{{Storage::url($histoire->photo)}}" alt="Image {{$histoire->titre}}">
            @endif

            <h1>{{$histoire->titre}}</h1>
        </div>

        <div id="resume">
            <h3>Résumé :</h3>
            <p>{{$histoire->pitch}}</p>
        </div>

        <p>Histoire écrite par : {{$histoire->user->name}}</p>

        <p>Cette histoire a été terminée {{$histoire->terminees()->count()}} fois</p>

        <a href="#">Commencer l'aventure</a>

        <div id="avis">
            <h3>Avis :</h3>
            @foreach($histoire->avis as $avis)
                <div class="comment">
                <p>{{$avis->contenu}}</p>
                <p>Ajouté le : {{$avis->created_at}}</p>
                </div>
            @endforeach
        </div>
    @else
        <h1>Histoire en construction...</h1>
    @endif
</section>
@endsection