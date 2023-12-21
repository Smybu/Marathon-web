@extends('templates.app')

@section('titre', $chapitre->titre)

@section('content')
<section id="lecture_chapitre">
    <h1>{{$chapitre->titre}}</h1>

    @if($chapitre->media != null)
        <img src="{{Storage::url($chapitre->media)}}" alt="Image {{$chapitre->titrecourt}}">
    @endif

    <p>{{$chapitre->texte}}</p>
    <p>{{$chapitre->question}}</p>

    @if($chapitre->suivants()->count() > 0)
        @foreach($chapitre->suivants as $suivant)
            <a href="{{route('lecture', ['id' => $suivant->id])}}">{{$suivant->pivot->reponse}}</a>
        @endforeach
    @else
        <p>L'histoire est terminé, merci de votre lecture. N'hésitez pas à aller commenter ;)</p>
        <a href="{{route('histoire.show', ['histoire' => $chapitre->histoire_id])}}">Retour à l'histoire</a>
    @endif
</section>
@endsection