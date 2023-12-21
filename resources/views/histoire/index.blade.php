@extends('templates.app')

@section('content')
<section id="histoire_index">
    <div id="histoire_index_head">
        <h1>Liste des Histoires</h1>

        <form id="form" action="{{route('histoire.index')}}">
            <select name="g">
                <option @if($g === 'All') selected="selected" @endif value="All">Toutes les histoires</option>
                @foreach($genres as $genre)
                    <option @if($g === $genre) selected="selected" @endif value="{{$genre}}">{{$genre}}</option>
                @endforeach
            </select>
            <input type="submit" value="OK">
        </form>
    </div>

    <div id="liste-histoires">
        @if(!empty($histoires))
            @foreach($histoires as $histoire)
                <div class="histoire">
                    <a href="{{route('histoire.show', ['histoire' => $histoire->id])}}">
                        <div class="histoire-logo">
                            @if(str_starts_with($histoire->photo, 'https:') || str_starts_with($histoire->photo, 'http'))
                                <img src="{{$histoire->photo}}" alt="Image {{$histoire->titre}}">
                            @else
                                <img src="{{Storage::url($histoire->photo)}}" alt="Image {{$histoire->titre}}">
                            @endif
                        </div>
                        <div class="histoire-description">
                            <h4>{{$histoire->titre}}</h4>
                            <p>{{$histoire->pitch}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <h3>Aucune histoire dans la table ...</h3>
        @endif
    </div>


    <script>
        function submitForm() {

            const form = document.getElementById('form');
            let category = form.elements["g"].value;
            if (form.elements["g"].value === "") {
                category = 'all';
            }
            document.location.href = "/histoire?g=" + form.elements["g"].value;

        }
    </script>
</section>
@endsection
