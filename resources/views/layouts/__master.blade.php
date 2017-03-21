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
    <footer id="footer" class="dark">

        <div class="container">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap clearfix">


            </div><!-- .footer-widgets-wrap end -->

        </div>

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i
                            class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i
                            class="icon-skype2"></i> CanvasOnSkype
                </div>
            </div>
        </div><!-- #copyrights end -->
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
