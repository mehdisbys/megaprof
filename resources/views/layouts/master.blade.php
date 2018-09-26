<!DOCTYPE html>
<html lang="fr">
<head>
    @section('title')
        <title>@lang('layouts/master.pageTitle')</title>
    @show
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>

    @section('meta_description')
        <meta name="Description" lang="fr"
              content="@lang('layouts/master.title')"/>
    @show

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="theme-color" content="#ffffff"/>
    <meta property="og:title" content="@lang('layouts/master.metaTitle')"/>
    <meta property="og:image" content="/temp-image/megaprof@2x.png"/>
    <meta property="og:site_name" content="@lang('layouts/master.taelam')"/>
    <meta property="og:description" content="@lang('layouts/master.findATeacher')"/>


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
    @yield('custom-head')
</head>

<body>

<header id="header" class="header">

    <div id="header-wrap">

        <div class="head">
            <nav class="navbar navbar-site" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button style="background-color: #fd875e;" data-target=".navbar-collapse" data-toggle="collapse"
                                class="navbar-toggle"
                                type="button">
                            <span class="sr-only">Toggle navigation</span> <span class="fa fa-bars fa-lg"></span>
                        </button>


                        <a class="header-logo header-logo-normal"
                           href="/" title="@lang('layouts/master.goHome')">
                            <img src="/temp-images/megaprof.png" width="170"
                                 alt="@lang('layouts/master.logoAlt')"/>
                            <img src="/images/icons/morocco_square_icon_64.png" alt="" class="morocco-flag">
                        </a>
                    </div>
                    <div class="navbar-collapse collapse">

                        <ul class="nav navbar-nav navbar-right top-header-menu">

                            @if(Auth::check())
                                <li><a class="header-item"
                                       href="/nouvelle-annonce-1">@lang('layouts/master.createAdvert')</a></li>
                                <li><a class="header-item" href="/mon-compte">@lang('layouts/master.myAccount') <span
                                                class="badge blue-badge notification-count">{{\App\Models\Notification::currentUserNotificationsCount()}}</span></a>
                                </li>
                                <li><a class="header-item" href="/logout">@lang('layouts/master.logout')</a></li>
                                <li><a class="header-item" href="/faq">@lang('layouts/master.help')</a></li>
                            @endif

                            @if(Auth::check() == false)
                                <li><a class="header-item" href="/login">@lang('layouts/master.connect')</a></li>
                                <li><a class="header-item" href="/inscription">@lang('layouts/master.register')</a></li>
                                <li><a class="header-item" href="/faq">@lang('layouts/master.help')</a></li>
                                <li><a id="donner-des-cours" class="button"
                                       href="/professeur">@lang('layouts/master.giveLessons')</a></li>
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

                    <h6 class="heading7">@lang('layouts/master.ABOUT')</h6>
                    <div><a href="/faq">@lang('layouts/master.FAQ')</a></div>
                    <div><a href="/nouvelle-annonce-1"> </a></div>
                    <div><a href="/cgu">@lang('layouts/master.cgu')</a></div>
                    <div><a href="/professeur">@lang('layouts/master.becomeTeacher')</a></div>
                    <div><a href="/blog">@lang('layouts/master.blog')</a></div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 paddingtop-bottom">

                <div class="text-center center-block">
                    <h6 class="heading7">@lang('layouts/master.FOLLOW')</h6>
                    <br/>
                    <a href="https://www.facebook.com/taelamOfficiel"><i id="social-fb"
                                                                         class="fa fa-facebook-square fa-3x social"></i></a>
                    <a href="https://twitter.com/taelam_officiel"><i id="social-tw"
                                                                     class="fa fa-twitter-square fa-3x social"></i></a>
                    <a href="https://plus.google.com/u/1/115934799609055669898"><i id="social-gp"
                                                                                   class="fa fa-google-plus-square fa-3x social"></i></a>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 footerleft">
                <div class="text-center center-block">

                    <h6 class="heading7"></h6>
                    <img class="flag" src="/css/flags/flags/4x3/ma.svg" alt="Drapeau Marocain">

                    <p><em>
                            <small>@lang('layouts/master.taelamDescription')</small>
                        </em></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 ">
                <div class="text-center center-block">

                    <h6 class="heading7">@lang('layouts/master.CONTACT')</h6>

                    <!--  <div><i class="fa fa-newspaper-o"></i> <a href="">Presse</a></div> -->
                    <div><i class="fa fa-envelope"></i> <a class="mouse-hand" data-toggle="modal" data-target="#contact"
                                                           data-original-title>@lang('layouts/master.contactUs')</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>


@include('main.partials.contactForm')

</body>
@include('includes/toastr/toastr')
{!! HTML::script("js/functions.js") !!}
<script src='https://www.google.com/recaptcha/api.js'></script>
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
