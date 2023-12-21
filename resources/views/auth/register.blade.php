@extends("templates.app")

@section('content')
<section class="section-register">
    <form class="formulaire-logins" action="{{route("register")}}" method="post">

        <h1>S'enregistrer</h1>
    @csrf
        <div class="logins-inputs">
            <div class="aff-row">
                <label id="icon" for="name"><i class="fa-solid fa-user"></i></label>
                <input type="text" name="name" required placeholder="pseudo" /><br />
            </div>

            <div class="aff-row">
                <label id="icon" for="email"><i class="fa-solid fa-envelope"></i></label>
                <input type="email" name="email" required placeholder="Email" /><br />
            </div>

            <div class="aff-row">
                <label id="icon" for="password"><i class="fa-solid fa-lock"></i></label>
                <input type="password" name="password" required placeholder="password" /><br />
            </div>

            <div class="aff-row">
                <label id="icon" for="password_confirmation"><i class="fa-solid fa-lock"></i></label>
                <input type="password" name="password_confirmation" required placeholder="password" /><br />
            </div>

                <!-- <input type="submit" />-->
                <button class="register-send" type="submit">Envoyer</button>


        <p class="ask">Déjà un compte ? <a href="{{route("login")}}">Connectez-vous</a></p>
        </div>
    </form>
</section>
@endsection
