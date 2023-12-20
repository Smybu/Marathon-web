@extends("templates.app")

@section('content')
    <div style="display: flex;align-items: center; justify-content: center">
        <div class="main-title">
            <h1>Bienvenue dans le Panthéon</h1>
        </div>
        <div class="second-title">
            <h2>Voici quelques histoires :</h2>
        </div>

        <div class="history">
            @if(!empty($histoires))

                @foreach($histoires as $histoire)
                    <h3><a href="#">{{$histoire['titre']}}</a></h3>
                    <h4>{{$histoire['pitch']}}</h4>
                @endforeach

            @endif
        </div>
    </div>

@endsection