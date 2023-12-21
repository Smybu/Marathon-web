@extends('templates.app')

@section('title', $histoire->titre)

@section('content')
    <section class="container-histoire-show">
        <div class="histoire-show">
        @if($histoire->active || auth()->id() == $histoire->user_id)
            <div class="head_histoire">
                @if(str_starts_with($histoire->photo, 'https:') || str_starts_with($histoire->photo, 'http'))
                    <img src="{{$histoire->photo}}" alt="Image {{$histoire->titre}}">
                @else
                    <img src="{{Storage::url($histoire->photo)}}" alt="Image {{$histoire->titre}}">
                @endif

                <h1>{{$histoire->titre}}</h1>
            </div>

            <div class="resume">
                <h1>Résumé :</h1>
                <p>{{$histoire->pitch}}</p>


            <p>Histoire écrite par : <a href="{{route('user', ['id' => $histoire->user->id])}}">{{$histoire->user->name}}</a></p>
            @if(Auth::check() && auth()->id() == $histoire->user_id)
                <button class="bouton-histoire-show"><a href="{{route('histoire.edit', ['histoire' => $histoire->id])}}">Modifier</a></button>
                <form action="{{route('histoire.destroy', ['histoire' => $histoire->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="input-histoire-show" type="submit" value="Supprimer" onclick="return confirm('Êtes vous sûr de vouloir supprimer l\'histoire ? Cette action est irréversible.')">
                </form>
            @endif

            <p>Cette histoire a été terminée {{$histoire->terminees()->count()}} fois</p>

            @if(Auth::check())
                <a href="{{route('lecture', ['id' => $histoire->premier()->id])}}">Commencer l'aventure</a>
            @else
                <a href="{{route('login')}}">Connecte toi pour lire cette histoire</a>
            @endif

            <div id="avis">
                <h3>Avis :</h3>
                @foreach($histoire->avis as $avis)
                    <div class="resume">
                        <p>{{$avis->contenu}}</p>
                        <p>Ajouté le : {{$avis->created_at}}</p>
                        @if(Auth::check() && ($avis->user_id == auth()->id()))
                            <button class="bouton-histoire-show"><a href="{{route('delete_avis', ['histoire_id' => $histoire->id, 'avis_id' => $avis->id])}}">Supprimer</a></button>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <h1>Histoire en construction...</h1>
        @endif

        @if(Auth::check())
            <form action="{{route('add_avis', ['id' => $histoire->id])}}" method="post">
                @csrf
                <div class="align-elements-histoire-show">
                    <label for="contenu">Contenu : <input type="text" name="contenu" id="contenu"></label>
                    <input class="commenter" type="submit" value="Commenter">
                </div>
            </form>
        @endif
        </div>
    </section>
@endsection