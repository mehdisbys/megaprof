<!DOCTYPE html>
<html lang="fr">
<head>
    @section('title')
        <title>Cours particuliers Taelam - Trouvez un professeur particulier au Maroc : Soutien scolaire, Concours,
            Mathématiques, Langues...</title>
    @show
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>

    @section('meta_description')
        <meta name="Description" lang="fr"
              content="Cours particuliers, cours à domicile, soutien scolaire en mathématiques, anglais, arabe, et bien d'autres matières dans tout le Maroc"/>
    @show

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="theme-color" content="#ffffff"/>
    <meta property="og:title" content="Taelam - La plateforme des professeurs particuliers"/>
    <meta property="og:image" content="/temp-image/megaprof@2x.png"/>
    <meta property="og:site_name" content="Taelam"/>
    <meta property="og:description" content="Trouvez votre professeur pour des cours particuliers"/>


    <link rel="apple-touch-icon" sizes="57x57" href="/"/>
    <link rel="apple-touch-icon" sizes="60x60" href="/"/>
    <link rel="icon" sizes="32x32" type="image/png" href="/"/>
    <link rel="icon" sizes="16x16" type="image/png" href="/"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">


    {!! HTML::style('/css/all.css') !!}
    {!! HTML::style('css/fa/css/font-awesome.min.css')!!}

    {!! HTML::script("js/jquery.js") !!}
    {!! HTML::script("js/bootstrap.min.js") !!}

    @include('user_tracking.smartlook')


<!-- TODO convert to sass files   -->
    @yield('custom-head')
</head>

<body>

<header id="header" class="header">

    <div id="header-wrap">

        <div class="head">
            <nav class="navbar navbar-site" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button style="background-color: #ff8c00;" data-target=".navbar-collapse" data-toggle="collapse"
                                class="navbar-toggle"
                                type="button">
                            <span class="sr-only">Toggle navigation</span> <span class="fa fa-bars"></span> <span
                                    class="icon-bar"></span> <span class="icon-bar"></span></button>
                        <a class="header-logo header-logo-normal"
                           href="/" title="Revenir à l'accueil de Taelam">
                            <img src="/temp-images/megaprof.png" width="170"
                                 alt="Cours particuliers avec Taelam"/>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse">

                        <ul class="nav navbar-nav navbar-right top-header-menu">

                            @if(Auth::check())
                                <li><a class="header-item" href="/nouvelle-annonce-1"> Créer une annonce</a></li>
                                <li><a class="header-item" href="/mon-compte">Mon Compte <span
                                                class="badge blue-badge notification-count">{{\App\Models\Notification::currentUserNotificationsCount()}}</span></a>
                                </li>
                                <li><a class="header-item" href="/logout">Se déconnecter</a></li>
                                <li><a class="header-item" href="/faq">Aide</a></li>
                            @endif
                            @if(Auth::check() == false and \Illuminate\Support\Facades\Request::is('professeur'))

                                <li><a class="header-item" href="/login">Se connecter</a></li>
                                <li><a class="header-item" href="/inscription">S'inscrire</a></li>
                            @endif

                            @if(Auth::check() == false)
                                <li><a class="header-item" href="/faq">Aide</a></li>
                                <li><a id="donner-des-cours" class="button" href="/nouvelle-annonce-1">Donner des
                                        cours</a></li>
                            @endif
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</header>


@include('includes.success')
@include('includes.error')

<div class="page">
    @section('content')
    @show
</div>

<!--footer start from here-->
<footer class="footer-div topmargin-sm row col-md-12" id="footer-div">
    <div class="container">
        <div class="row">

            <div class="col-md-2 col-sm-6 paddingtop-bottom col-md-offset-1">
                <div class="text-center center-block">

                    <h6 class="heading7">À PROPOS</h6>
                    <div><a href="/faq"> Foire Aux Questions</a></div>
                    <div><a href="/nouvelle-annonce-1"> Créer une annonce</a></div>
                    <div><a href="/cgu"> Conditions Générales</a></div>
                    <div><a href="/professeur"> Devenir Professeur</a></div>
                    <div><a href="#"> Qui sommes-nous</a></div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 paddingtop-bottom">

                <div class="text-center center-block">
                    <h6 class="heading7">SUIVEZ-NOUS</h6>
                    <br/>
                    <a href="https://www.facebook.com/taelam"><i id="social-fb"
                                                                 class="fa fa-facebook-square fa-3x social"></i></a>
                    <a href="https://twitter.com/taelam"><i id="social-tw"
                                                            class="fa fa-twitter-square fa-3x social"></i></a>
                    <a href="https://plus.google.com/+taelam"><i id="social-gp"
                                                                 class="fa fa-google-plus-square fa-3x social"></i></a>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 footerleft">
                <div class="text-center center-block">

                    <h6 class="heading7">TAELAM</h6>
                    <img class="flag" src="css/flags/flags/4x3/ma.svg" alt="Drapeau Marocain">

                    <p><em>
                            <small>Taelam est le premier site Marocain de partage de connaissances.
                                Apprenez sans limites ! Trouvez des professeurs dans tout le Maroc dans des dizaines de
                                matières différentes.
                            </small>
                        </em></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 ">
                <div class="text-center center-block">

                    <h6 class="heading7">CONTACT</h6>

                    <div><i class="fa fa-newspaper-o"></i> <a href="">Presse</a></div>
                    <div><i class="fa fa-envelope"></i> <a href="">Contactez-nous</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
@include('includes/toastr/toastr')
{!! HTML::script("js/functions.js") !!}

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-90487629-1', 'auto');
    ga('send', 'pageview');

</script>

</html> 
