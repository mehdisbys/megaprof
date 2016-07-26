<!-- <!DOCTYPE html> <!--[if IEMobile 7 ]>
<html lang="fr" class="iem7">
<![endif]--> <!--[if lt IE 7 ]>
<html lang="fr" class="ie6 oldie">
<![endif]--> <!--[if IE 7 ]>
<html lang="fr" class="ie7 oldie">
<![endif]--> <!--[if IE 8 ]>
<html lang="fr" class="ie8 oldie">
<![endif]-->
 <!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]> 
<html lang="fr">
 <!--<![endif]-->
<html lang="fr">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <title>Cours particuliers Megaprof - Trouvez un professeur particulier</title>
    <meta name="Description" lang="fr" content="Trouvez votre professeur particulier parmi"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="theme-color" content="#ffffff"/>
    <meta property="og:title" content="MegaPROF - La plateforme des professeurs particuliers"/>
    <meta property="og:image" content="/temp-image/megaprof@2x.png"/>
    <meta property="og:site_name" content="Megaprof"/>
    <meta property="og:description" content="Trouvez votre professeur pour des cours particuliers ou collectifs parmi"/>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />

    <link rel="apple-touch-icon" sizes="57x57" href=""/>
    <link rel="apple-touch-icon" sizes="60x60" href=""/>
    <link rel="icon" sizes="32x32" type="image/png" href=""/>
    <link rel="icon" sizes="16x16" type="image/png" href=""/>
    <!-- TODO convert to sass files   -->
    {!! HTML::style('temp-css/normalize.css') !!}
    {!! HTML::style('temp-css/autocomplete.css') !!}
    {!! HTML::style('temp-css/button.css') !!}
    {!! HTML::style('temp-css/components.css') !!}
    {!! HTML::style('temp-css/contact.css') !!}
    {!! HTML::style('temp-css/cookie-bar.css') !!}
    {!! HTML::style('temp-css/cropper.css') !!}
    {!! HTML::style('temp-css/dashboard.css') !!}
    {!! HTML::style('temp-css/favourite.css') !!}
    {!! HTML::style('temp-css/fonts.css') !!}
    {!! HTML::style('temp-css/footer.css') !!}
    {!! HTML::style('temp-css/header.css') !!}
    {!! HTML::style('temp-css/help-page.css') !!}
    {!! HTML::style('temp-css/how-does.css') !!}
    {!! HTML::style('temp-css/not-found.css') !!}
    {!! HTML::style('temp-css/pictures.css') !!}
    {!! HTML::style('temp-css/popin.css') !!}
    {!! HTML::style('temp-css/main.css') !!}
    {!! HTML::script("js/jquery.js") !!}

</head>
<body>
<div id="fb-root"></div>
<div class="header">
    <div class="header-burger-dropshadow"></div>
    <div class="wrapper">
        <div class="header-inner">
            <div class="header-inner-cell header-inner-cell-logo">
                <button class="header-burger-button"> Menu<span class="header-burger-icon"> </span></button>
                <a class="header-logo header-logo-normal" href="/" title="Revenir à l'accueil de Megaprof">
                <img src="/temp-images/megaprof.png" srcset="/temp-images/megaprof.png 1x, /temp-images/megaprof@2x.png 2x" width="170"
                         alt="Cours particuliers avec Megaprof"/>
                </a>
            </div>

            <div class="header-inner-cell header-inner-cell-menu">
                <button class="header-burger-close"></button>
                <div class="header-menu-inner">
                    @if(Auth::check())
                    <a class="header-item" href="/nouvelle-annonce-1"> Créer une annonce</a>
                    <a class="header-item" href="/mon-compte">Mon Compte</a>
                    <a class="header-item" href="/mes-messages">Messages</a>
                    <a class="header-item" href="/logout">Se déconnecter</a>
                    <a class="header-item" href="/aide">Aide</a>
                    @else
                    <a class="header-item" href="/login">Créer une annonce</a>
                    <a class="header-item" href="/login">Se connecter</a>
                    <a class="header-item" href="/inscription">S'inscrire</a>
                    <a class="header-item" href="/aide">Aide</a>
                @endif
                <a class="button" href="/nouvelle-annonce-1">Donner des cours</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="page">
    @section('content')
    @show
</div>

<div class="notification valid hidden" id="errorNotification" data-timeout="15000">
    <div class="wrapper">
        <p class="notification-text"></p>
        <div class="notification-close"></div>
    </div>
</div>

<div class="footer">
    <div class="wrapper">
                <div class="footer-inner">
            <div class="footer-inner-top">
                <div class="footer-inner-cell footer-inner-cell-confidence"
                                itemtype="http://data-vocabulary.org/Review-aggregate" itemscope="">
                    <h3>Confiance</h3>
                        <ul class="rating" style="padding: 0 0 5px 0">
                        <li class="star-full"> </li>
                        <li class="star-full"></li>
                        <li class="star-full"></li>
                        <li class="star-full"></li>
                        <li class="star-half"></li>
                    </ul>
                    <p>
                        <a href="#" target="_blank">
                        <span itemprop="rating" itemscope="" itemtype="http://data-vocabulary.org/rating">
                        est évalué
                        <strong>
                        <span
                                itemprop="average">9.4</span>/<span
                                    itemprop="best">10</span>
                        </strong>
                        </span>
                            par <br>
                            <strong>
                                <span itemprop="votes">0000</span></strong> <span
                                    itemprop="reviewer"></span>
                        </a>
                    </p>
                </div>
                <div class="footer-inner-cell footer-inner-cell-socials">
                    <h3>Social</h3>
                    <ul class="footer-socials">
                        <li>
                            <button class="social-facebook a-js" data-href="https://www.facebook.com/"></button>
                        </li>
                        <li>
                            <button class="social-google-plus a-js"
                                    data-href="https://plus.google.com/+Megaprof/"></button>
                        </li>
                    </ul>
                </div>
                <div
                        class="footer-inner-cell footer-inner-cell-profs">
                    <h3>Professeurs</h3>
                    <ul class="list">
                        <li>
                            <a href="" title="">Toutes les matières</a>
                        </li>
                    </ul>
                </div>
                <div
                        class="footer-inner-cell footer-inner-cell-about">
                    <h3>A propos</h3>
                    <ul class="list">
                        <li>
                            <a href="" title="">Mentions légales</a>
                        </li>
                        <li>
                            <a href="" title="">Le mag We Love Prof</a>
                        </li>
                        <li>
                            <a href="" title="">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-inner-bottom">
                <div class="footer-inner-cell">
                    <h3>Megaprof dans le monde</h3>
                    <ul class="list">
                        <li>
                            <a href="#" title="Brasil">Aulas particulares</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html> 
