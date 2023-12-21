<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font de texte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <!-- Font de Chapitres -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Rufina&display=swap" rel="stylesheet">
    <!-- -->

    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<section id="all">
<header>
    <nav>
        <div class="conteneur">
            <div class="gauche">
                <a href="{{route('index')}}" class="logo-link"><img class="logo" src="{{Vite::asset('resources/images/Titre_et_logo.png')}}" alt="" srcset=""></a>
            </div>

            <div class="milieu">
                @if(Auth::check())<a href="{{route('histoire.create')}}">Créer une<br/>histoire</a>@endif
                <a href="{{route('histoire.index')}}">histoires</a>
                <a href="#">mes histoires</a>
            </div>

            <div class="droite">
                <a href="#"><img src="{{Vite::asset('resources/images/icon_Login_Register.png')}}" alt="" srcset=""></a>

                @auth
                    <p class="name">{{Auth::user()->name}}</p>
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
    <div class="container-footer">
        <div class="box">
            <h1 class="titre-footer">A propos</h1>
            <ul>
                <!-- Ajouter les routes-->
                <li><a href="#" class="texte-footer">Qui sommes nous ?</a></li>
                <li><a href="#" class="texte-footer">Mentions légales</a></li>
            </ul>
        </div>
        <div class="box-2">
            <h1 class="titre-footer">plan du site</h1>
            <ul>
                <!-- Ajouter les routes-->
                <div class="modif-flex">
                    <li><a href="{{route('index')}}" class="texte-footer">Accueil</a></li>
                    <li><a href="{{route('histoire.index')}}" class="texte-footer">Histoires</a></li>
                    <li><a href="#" class="texte-footer">Mes histoires</a></li>
                </div>

                <div class="modif-flex">
                    <li><a href="{{route("login")}}" class="texte-footer">Login</a></li>
                    <li><a href="{{route("register")}}" class="texte-footer">Register</a></li>
                </div>

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
        <p class="copyright">&copy; Tous droits réservés</p>
    </div>

</footer>
</section>
</body>
</html>
