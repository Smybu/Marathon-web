@extends('templates.app')

@section('title', 'Création d\'une scène')

@section('content')
<section id="histoire_create">
    @if(Auth::check())
        <h1>Création d'une histoire</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('histoire.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="titre">Titre : <input type="text" name="titre"></label>
            <label for="pitch">Résumé : <input type="text" name="pitch"></label>
            <label for="photo">Image : <input type="file" name="photo"></label>
            <label for="genre">Genre :
                <select name="genre">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->label}}</option>
                    @endforeach
                </select>
            </label>
            <label for="active">Histoire active : <input type="checkbox" name="active"></label>
            <input type="submit" value="Enregistrer">
        </form>
    @else
        <h1>Vous devez être connecté pour créer une histoire</h1>
        <a href="#">Se connecter</a>
    @endif
</section>

@endsection