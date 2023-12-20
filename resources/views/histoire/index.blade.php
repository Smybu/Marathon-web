@extends('templates.app')

@section('content')

    <div class="titres">
        <h1>Liste des Histoires</h1>
    </div>

    <form id="form" action="{{route('histoire.index')}}">
        <select name="g">
            <option @if($g === 'All') selected="selected" @endif value="All">Toutes les histoires</option>
            @foreach($genres as $genre)
                <option @if($g === $genre) selected="selected" @endif value="{{$genre}}">{{$genre}}</option>
            @endforeach
        </select>
        <input type="submit" value="OK">
    </form>



    @if(Auth::check())
        <h3><a href="#">Créer une histoire</a></h3>
    @endif

    @if(!empty($histoires))
        <table>
            <thead>
            <tr>
                <th>Titre</th>
                <th>Pitch</th>

            </tr>
            </thead>
            <tbody>
            @foreach($histoires as $histoire)
                <tr>
                    <td><a href="{{route('histoire.show', ['histoire' => $histoire->id])}}">{{$histoire->titre}}</a></td>
                    <td>{{$histoire->pitch}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3>Aucune histoire dans la table ...</h3>
    @endif

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
@endsection
