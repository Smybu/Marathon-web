@extends('templates.app')

@section('title', 'Création d\'une scène')

@section('content')
<section id="histoire_create">
    @if(Auth::check())

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
            <h1>Création d'une histoire</h1>
            <label for="titre">Titre : <input type="text" name="titre" value="{{old('titre')}}"></label>
            <label for="pitch">Résumé : <input type="text" name="pitch" value="{{old('pitch')}}"></label>
            <label for="photo">Image : <input type="file" name="photo" value="{{old('photo')}}"></label>
            <label for="genre">Genre :
                <select name="genre">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}" @if($genre->id == old('genre')) selected @endif>{{$genre->label}}</option>
                    @endforeach
                </select>
            </label>
            <label for="active">Histoire active : <input type="checkbox" name="active" value="{{old('active')}}"></label>
            <input type="submit" id="submit_button" value="Enregistrer">
        </form>
    @else
        <h1>Vous devez être connecté pour créer une histoire</h1>
        <a href="#">Se connecter</a>
    @endif
</section>

@endsection
