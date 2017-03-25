<!DOCTYPE html>
<html dir="ltr" lang="fr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>


    {!! HTML::style('/css/bootstrap.css') !!}
    {!! HTML::style('/css/style.css')!!}
    {!! HTML::style('/temp-css/dashboard.css') !!}
    {!! HTML::style('/css/dark.css')!!}
    {!! HTML::style('/css/font-icons.css')!!}
    {!! HTML::style('/css/animate.css')!!}
    {!! HTML::style('/css/magnific-popup.css')!!}
    {!! HTML::style('/css/checkbox-button.css')!!}
    {!! HTML::style('/css/custom.css')!!}
    {!! HTML::style("/css/responsive.css") !!}
    {!! HTML::style("/css/toastr.min.css") !!}
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
{!! HTML::script("/js/jquery.js") !!}
{!! HTML::script("/js/plugins.js") !!}


<!-- Document Title
    ============================================= -->
    <title>Taelam</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="full-header sticky-header">

        <div id="header-wrap">

            <div class="header">
                <nav class="navbar   navbar-site navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle"
                                    type="button">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                        class="icon-bar"></span> <span class="icon-bar"></span></button>
                            <a class="header-logo header-logo-normal"
                               href="/" title="Revenir à l'accueil de Taelam">
                                <img src="/temp-images/megaprof.png" width="170"
                                     alt="Cours particuliers avec Taelam"/>
                            </a>
                        </div>
                        <div class="navbar-collapse collapse">

                            <ul class="nav navbar-nav navbar-right">

                                @if(Auth::check())
                                    <li><a class="header-item" href="/nouvelle-annonce-1"> Créer une annonce</a></li>
                                    <li><a class="header-item" href="/mon-compte">Mon Compte <span
                                                    class="badge blue-badge">{{\App\Models\Notification::currentUserNotificationsCount()}}</span></a>
                                    </li>
                                    <li><a class="header-item" href="/logout">Se déconnecter</a></li>
                                    <li><a class="header-item" href="/faq">Aide</a></li>

                                @else
                                    <li><a class="header-item" href="/login">Créer une annonce</a></li>
                                    <li><a class="header-item" href="/login">Se connecter</a></li>
                                    <li><a class="header-item" href="/inscription">S'inscrire</a></li>
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

    </header><!-- #header end -->

    <!-- Page Sub Menu
    ============================================= -->
    <!-- #page-menu end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                @section('content')
                @show
            </div>

        </div>

    </section><!-- #content end -->

    <!-- Footer
    ============================================= -->
    <footer class="footer-div topmargin-sm" id="footer-div">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 paddingtop-bottom">
                    <div class="" style="text-align: center">
                        <h6 class="heading7" style="color: white">À PROPOS</h6>
                        <a href="#"> Foire Aux Questions</a>
                        <a href="#"> Créer une annonce</a>
                        <a href="#"> Conditions Générales</a>
                        <a href="#"> Devenir Professeur</a>
                        <a href="#"> Qui sommes-nous</a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 paddingtop-bottom">

                    <div class="text-center center-block">
                        <h6 class="heading7" style="color: white">SUIVEZ-NOUS</h6>
                        <br/>
                        <a href="https://www.facebook.com/taelam"><i id="social-fb"
                                                                     class="fa fa-facebook-square fa-3x social"></i></a>
                        <a href="https://twitter.com/taelam"><i id="social-tw"
                                                                class="fa fa-twitter-square fa-3x social"></i></a>
                        <a href="https://plus.google.com/+taelam"><i id="social-gp"
                                                                     class="fa fa-google-plus-square fa-3x social"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12">
                    <h6 class="heading7" style="color: white">TAELAM</h6>

                    <p><em>
                            <small>Taelam est le premier site Marocain de partage de connaissances.
                                Apprenez sans limites ! Trouvez des professeurs dans tout le Maroc dans des dizaines de
                                matières différentes.
                            </small>
                        </em></p>
                </div>

                <div class="col-md-3 col-sm-6 ">
                    <h6 class="heading7" style="color: white">CONTACT</h6>

                    <p><i class="fa fa-newspaper-o"></i> <a href="">Presse</a></p>
                    <p><i class="fa fa-envelope"></i> <a href="">Contactez-nous</a></p>
                </div>
            </div>
        </div>
    </footer><!-- #footer end -->
</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Footer Scripts
============================================= -->
{!! HTML::script("js/functions.js") !!}

@include('includes/toastr/toastr')
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
</body>
</html>
