@extends("templates.app")

@section('content')
    <section id="accueil">
        <div class="container-accueil">
            <div class="main-title">
                <h1>Bienvenue dans le Panthéon</h1>
            </div>
            <div class="second-title">
                <h2>Voici quelques histoires :</h2>
            </div>

            <div class="history">
                @if(!empty($histoires))

                    @foreach($histoires as $histoire)
                        <div class="accueil-box">
                            <h3><a href="#">{{$histoire['titre']}}</a></h3>
                            <p>{{$histoire['pitch']}}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection