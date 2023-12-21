@extends("templates.app")

@section('title', $user->name)

@section('content')
    <section id="profil">
        <div class="main-profil">
            <h2>Voici le profil de : {{$user->name}}</h2>
        </div>
        <div class="bio">
            <p>Email : {{$user->email}}</p>
        </div>
        <div class="histoires">
            @if($user->mesHistoires->isNotEmpty())
                <h4>Ses histoires ({{$user->mesHistoires->count()}})</h4>
                @foreach ($user->mesHistoires as $mesHistoires)

                    <p>{{$mesHistoires->titre}}</p>

                @endforeach
            @else
                <p>Il n'a pas écrit d'histoire</p>
            @endif
        </div>

        <div class="lecture">
            @if($user->terminees->isNotEmpty())
                <h4>Ses lectures terminées ({{$user->terminees->count()}})</h4>

                @foreach ($user->terminees as $terminees)

                    <p>{{$terminees->titre}}</p>

                @endforeach
            @else
                <p>Il n'a pas fini de lectures</p>
            @endif
        </div>
    </section>

@endsection

