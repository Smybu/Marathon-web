@extends("templates.app")

@section('content')

    <section id="profil">
        <div class="main-profil">
            <h2>Voici votre profil</h2>
        </div>
        <div class="bio">
            <p>Nom : {{Auth::user()->name}}</p>
            <p>Email : {{Auth::user()->email}}</p>
        </div>
        <div class="histoires">
            @if(Auth::user()->mesHistoires->isNotEmpty())
                <h4>Vos histoires ({{Auth::user()->mesHistoires->count()}})</h4>
                @foreach (Auth::user()->mesHistoires as $mesHistoires)

                    <p>{{$mesHistoires->titre}}</p>

                @endforeach
            @else
                <p>Vous n'avez écrit aucune histoire</p>
            @endif
        </div>

        <div class="lecture">
            @if(Auth::user()->terminees->isNotEmpty())
                <h4>Vos lectures terminées ({{Auth::user()->terminees->count()}})</h4>

                @foreach (Auth::user()->terminees as $terminees)

                    <p>{{$terminees->titre}}</p>

                @endforeach
            @else
                <p>Vous n'avez pas pas terminée de lectures</p>
            @endif
        </div>
    </section>

@endsection