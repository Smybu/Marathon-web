<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "Page en cours"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
    <nav>
        <div class="conteneur">
            <div class="gauche">
                <img class="logo" src="{{Vite::asset('resources/images/pantheon_logo_blanc.png')}}" alt="" srcset="">
                <a href="{{route('index')}}" class="logo-link"> </a>

                    <p class="titre-logo">le panthéon</p>

            </div>

            <div class="milieu">
                <a href="#">histoires</a>
                <a href="#">mes histoires</a>
            </div>

            <div class="droite">
                <a href="#"><img src="{{Vite::asset('resources/images/icon_Login_Register.png')}}" alt="" srcset=""></a>

                @auth
                    <p class="name">Votre nom:{{Auth::user()->name}}</p>
                    <button class="logout-btn"><a href="{{route("logout")}}"
                       onclick="document.getElementById('logout').submit(); return false;">Logout</a></button>
                    <form id="logout" action="{{route("logout")}}" method="post">
                        @csrf
                    </form>
                @else
                    <a class="name" href="{{route("login")}}">Login</a>
                    <a class="name" href="{{route("register")}}">Register</a>
                @endauth
            </div>
        </div>




    </nav>
</header>
<main>
    @yield("content")
</main>

<footer>IUT de Lens</footer>
</body>
</html>
