@extends("templates.app")

@section('content')
    <section class="container-encours">
        <div class="box-encours">

        <h1>Création de votre histoire: {{$histoire->titre}}</h1>


       @include("histoire.createChapitre", ['id' => $histoire->id])

        <ul>
        @foreach($histoire->chapitres as $c)
            <li>{{$c->id }} : {{$c->titrecourt}}</li>
        @endforeach
        </ul>
            <div class="section-liaison">
                <div class="container-liaisons">
                    <h1>Liaison des chapitres</h1>
                    <form method="post" action="{{route('lier', $histoire->id)}}">
                        @csrf
                        <div class="laisons-memeLigne">
                            <p>Origine</p>
                            <select name="origine" >
                                @foreach($histoire->chapitres as $c)
                                    <option value="{{$c->id }}">  {{$c->titrecourt}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="laisons-memeLigne">
                            <p>Destination</p>
                            <select name="destination">
                                @foreach($histoire->chapitres as $c)
                                    <option value="{{$c->id }}">  {{$c->titrecourt}}</option>
                                @endforeach
                            </select>
                        </div>
                            <input class="input-encours" type="text" placeholder="Réponse" name="reponse">
<br>
                        <button class="button-createChapitre" type="submit">Lier</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection