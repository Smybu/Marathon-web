@extends("templates.app")

@section('content')
    <h3>Création de {{$histoire->titre}}</h3>

    <div style="display: flex">
   <div  style="width:45%;"> @include("histoire.createChapitre", ['id' => $histoire->id])

    <ul>

    @foreach($histoire->chapitres as $c)
        <li>{{$c->id }} : {{$c->titrecourt}}</li>
    @endforeach
    </ul>
   </div>
        <div>
            <h3>Liaison des chapitres</h3>
            <hr class="mt-2 mb-2">
            <form method="post" action="{{route('lier', $histoire->id)}}">
                @csrf
                <p>Origine</p>
                <select name="origine" >
                    @foreach($histoire->chapitres as $c)
                        <option value="{{$c->id }}">  {{$c->titrecourt}}</option>
                    @endforeach
                </select>
                <p>Destination</p>
                <select name="destination">
                    @foreach($histoire->chapitres as $c)
                        <option value="{{$c->id }}">  {{$c->titrecourt}}</option>
                    @endforeach
                </select>
                <input type="text" name="reponse">
                <button class="btn btn-success" type="submit">Lier</button>
            </form>


        </div>
    </div>
@endsection