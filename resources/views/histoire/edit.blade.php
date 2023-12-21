@extends('templates.app')

@section('title', ('Édition de ' . $histoire->titre))

@section('content')
<section id="histoire_edit">
    @if(Auth::check() && auth()->id() == $histoire->user_id)
        <h1>Édition de {{$histoire->titre}}</h1>
        <form action="{{route('histoire.update', ['histoire' => $histoire->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="titre">Titre : <input type="text" name="titre" value="{{$histoire->titre}}"> </label>
            <label for="pitch">Résumé : <input type="text" name="pitch" value="{{$histoire->pitch}}"> </label>
            <label for="photo">Photo (ancienne : {{$histoire->photo}}) : <input type="file" name="photo"></label>
            <label for="active">Active : <input type="checkbox" name="active" value="{{$histoire->active}}"></label>
            <label for="genre">Genre :
                <select name="genre">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}" @if($genre->id == $histoire->genre_id) selected @endif>{{$genre->label}}</option>
                    @endforeach
                </select>
            </label>
            <div id="div-validate-button">
                <input type="submit" id="submit_button" value="Valider" onclick="return confirm('Êtes vous sûr de vouloir modifier l\'histoire ?')">
                <a href="{{route('histoire.destroy', ['histoire' => $histoire->id])}}" onclick="return confirm('Êtes vous sûr de vouloir supprimer l\'histoire ? Cette action est irréversible.')">Supprimer</a>
            </div>
        </form>
    @else
        <h1>Vous n'avez pas les droits pour modifier l'histoire {{$histoire->titre}}</h1>
    @endif
</section>
@endsection