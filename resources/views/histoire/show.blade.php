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

            <p>Histoire écrite par : <a href="{{route('user', ['id' => $histoire->user->id])}}">{{$histoire->user->name}}</a></p>
            @if(Auth::check() && auth()->id() == $histoire->user_id)
                <a href="{{route('histoire.edit', ['histoire' => $histoire->id])}}">Modifier</a>
                <form action="{{route('histoire.destroy', ['histoire' => $histoire->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Supprimer" onclick="return confirm('Êtes vous sûr de vouloir supprimer l\'histoire ? Cette action est irréversible.')">
                </form>
            @endif

            <p>Cette histoire a été terminée {{$histoire->terminees()->count()}} fois</p>

            <a href="#">Commencer l'aventure</a>

            <div id="avis">
                <h3>Avis :</h3>
                @foreach($histoire->avis as $avis)
                    <div class="comment">
                        <p>{{$avis->contenu}}</p>
                        <p>Ajouté le : {{$avis->created_at}}</p>
                        @if(Auth::check() && ($avis->user_id == auth()->id()))
                            <a href="{{route('delete_avis', ['histoire_id' => $histoire->id, 'avis_id' => $avis->id])}}">Supprimer</a>
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
                <label for="contenu">Contenu : <input type="text" name="contenu" id="contenu"></label>
                <input type="submit" value="Commenter">
            </form>
        @endif
    </section>
@endsection