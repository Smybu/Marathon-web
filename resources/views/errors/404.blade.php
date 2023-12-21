<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>404</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<section class="Error">
    <h1 class="center titre-404">404</h1>
    <!--
    <div class="images-container-404">
        <div class="img-gauche">
            <img class="hercule" src="{{Vite::asset('resources/images/hercule_404.png')}}" alt="hercule">
        </div>
        *<div class="img_droite">
            <img class="hermes" src="{{Vite::asset('resources/images/Hermes_404.png')}}" alt="hermes">
        </div>*
        <div class="img_droite">
            <img class="hermes" src="{{Vite::asset('resources/images/Hermes_404update.png')}}" alt="hermes">
        </div>
        -->
    <div class="images-container-404">
        <img class="hercule" src="{{Vite::asset('resources/images/hercule_404.png')}}" alt="hercule">
        <img class="hermes" src="{{Vite::asset('resources/images/Hermes_404update.png')}}" alt="hermes">
    </div>
    </div>

    <div class="center">
        <button class="button-style">
            <a class="retour-accueil" href="{{ route('index') }}">Retourner à l'accueil</a>
        </button>
    </div>

</section>

</body>
</html>
