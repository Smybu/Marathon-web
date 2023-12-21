@extends("templates.app")

@section('content')
    <section class="section-register">

    <form class="formulaire-logins" action="{{route("login")}}" method="post">

        <h1>Se connecter</h1>
        @csrf
        <div class="logins-inputs">
            <div class="aff-row">
                <label id="icon" for="email"><i class="fa-solid fa-envelope"></i></label>
            <input type="email" name="email" required placeholder="Email" /><br />
            </div>
            <div class="aff-row">
                <label id="icon" for="password"><i class="fa-solid fa-lock"></i></label>
        <input type="password" name="password" required placeholder="password" /><br />
            </div>
            <div class="aff-row">

            Remember me<input type="checkbox" name="remember"   /><br />
            </div>
        <!--<input type="submit" /><br />-->
                <button class="register-send" type="submit">Envoyer</button>

        </div>
    </form>
@endsection