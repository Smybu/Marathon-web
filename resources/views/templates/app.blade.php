<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "Page en cours"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

<footer>
    <!--
    <div class="container-footer">
        <div class="box">
            <ul><h1 class="titre-footer">A propos</h1>

                <li><a href="#" class="texte-footer">Qui sommes nous ?</a></li>
                <li><a href="#" class="texte-footer">Mentions légales</a></li>
            </ul>
        </div>
        <div class="box">
            <ul><h1 class="titre-footer">plan du site</h1>

            <li><a href="#" class="texte-footer">Accueil</a></li>
            <li><a href="#" class="texte-footer">Histoires</a></li>
            <li><a href="#" class="texte-footer">Mes histoires</a></li>
            <li><a href="#" class="texte-footer">Login / Register</a></li>
            </ul>
        </div>
        <div class="box">
            <ul><h1 class="titre-footer">Contact</h1>
                <div class="logos-rs">
                    <a href="#" class="texte-footer"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="texte-footer"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="texte-footer"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </ul>
        </div>
    </div>
    -->
    <div class="container-footer">
        <div class="box">
            <h1 class="titre-footer">A propos</h1>
            <ul>
                <!-- Ajouter les routes-->
                <li><a href="#" class="texte-footer">Qui sommes nous ?</a></li>
                <li><a href="#" class="texte-footer">Mentions légales</a></li>
            </ul>
        </div>
        <div class="box">
            <h1 class="titre-footer">plan du site</h1>
            <ul>
                <!-- Ajouter les routes-->
                <li><a href="#" class="texte-footer">Accueil</a></li>
                <li><a href="#" class="texte-footer">Histoires</a></li>
                <li><a href="#" class="texte-footer">Mes histoires</a></li>
                <li class="texte-footer"><a href="#">Login</a> / <a href="#">Register</a></li>
            </ul>
        </div>
        <div class="box">
            <h1 class="titre-footer">Contact</h1>
            <ul>
                <div class="logos-rs">
                    <a href="#" class="texte-footer"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="texte-footer"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="texte-footer"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </ul>
        </div>
    </div>

</footer>
</body>
</html>
