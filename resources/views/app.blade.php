<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ciao</title>
        <meta charset="utf-8">
        <script src="{{ asset('/front/js/packJs.php') }}"></script>
        <link href="{{ asset('/front/css/main.css') }}" rel="stylesheet">
        
        <link rel="icon" type="image/png" href="{{ asset('/favicon.png') }}" />
        <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" /><![endif]-->
    </head>
    <body class="image">
        <div id="wrapper">
            <header class="main">
                <ul>
                    <li>
                        <a href="inscription">S'inscrire</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="login">Connexion</a>
                    </li>
                </ul>
            </header>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.html">Accueil</a>
                    </li>
                    <li>
                        <a href="#qr">Questions/Réponses</a>
                    </li>
                    <li>
                        <a href="#quiz">Quiz</a>
                    </li>
                    <li>
                        <a href="Urgences.html">Urgences</a>
                    </li>
                </ul>
            </nav>
            <div class="span12">
                <form id="search" class="form-search form-horizontal pull-right">
                    <div class="input-append span12">
                        <input type="text" class="search-query" placeholder="Search">
                        <button type="submit" class="btn"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
            
            @yield('content')
            
            <footer>
                <ul>
                    <li>
                        <a href="QuiSommesNous.html">Qui sommes-nous?</a>
                    </li>
                    <li>
                        <a href="#AvisUtilisateur">Ton avis</a>
                    </li>
                    <li>
                        <a href="ConditionsUtilisation.html">Conditions d'utilisation</a>
                    </li>
                    <li>
                        <a href="#PlanDuSite">Plan du site</a>
                    </li>
                </ul>
            </footer>
        </div>
    </body>
</html>
