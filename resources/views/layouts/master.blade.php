<!DOCTYPE html> 
<html lang="fr">
  <head>
    <title>Cours particuliers Taelam - Trouvez un professeur particulier</title>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <meta name="Description" lang="fr" content="Trouvez votre professeur particulier"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="theme-color" content="#ffffff"/>
    <meta property="og:title" content="Taelam - La plateforme des professeurs particuliers"/>
    <meta property="og:image" content="/temp-image/megaprof@2x.png"/>
    <meta property="og:site_name" content="Megaprof"/>
    <meta property="og:description" content="Trouvez votre professeur pour des cours particuliers"/>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />

    <link rel="apple-touch-icon" sizes="57x57" href="/"/>
    <link rel="apple-touch-icon" sizes="60x60" href="/"/>
    <link rel="icon" sizes="32x32" type="image/png" href="/"/>
    <link rel="icon" sizes="16x16" type="image/png" href="/"/>
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
    {!! HTML::style('/css/bootstrap.css') !!}
    {!! HTML::style('css/fa/css/font-awesome.min.css')!!}
    {!! HTML::style("/css/toastr.min.css") !!}


  {!! HTML::script("js/jquery.js") !!}
    <!-- {!! HTML::script("js/bootstrap.min.js") !!} -->

  <!-- TODO convert to sass files   -->
  </head>

  <body>
    <div id="fb-root"></div>
    <div class="header">
      <div class="wrapper">
        <div class="header-inner">
          <div class="header-inner-cell header-inner-cell-logo">
            <button class="header-burger-button"> 
              Menu<span class="header-burger-icon">&nbsp;</span>
            </button>
            <a class="header-logo header-logo-normal"
              href="/" title="Revenir à l'accueil de Megaprof">
              <img src="/temp-images/megaprof.png" width="170"
              alt="Cours particuliers avec Taelam"/>
            </a>
          </div>

          <div class="header-inner-cell header-inner-cell-menu">
            <div class="header-menu-inner">
              @if(Auth::check())
              <a class="header-item" href="/nouvelle-annonce-1"> Créer une annonce</a>
              <a class="header-item" href="/mon-compte">Mon Compte</a>
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
    @include('includes.success')
    @include('includes.error')
  <div class="page">
    @section('content')
    @show
  </div>

  <div class="footer">
    <div class="wrapper">
      <div class="footer-inner">
        <div class="footer-inner-top">
          <div class="footer-inner-cell footer-inner-cell-confidence"
            itemtype="http://data-vocabulary.org/Review-aggregate" itemscope="">
            <h3>Confiance</h3>
            <ul class="rating" style="padding: 0 0 5px 0">
              <li class="star-full">&nbsp;</li>
              <li class="star-full">&nbsp;</li>
              <li class="star-full">&nbsp;</li>
              <li class="star-full">&nbsp;</li>
              <li class="star-half">&nbsp;</li>
            </ul>
            <p>
              <a href="#" target="_blank"> est évalué </a>
            </p>
          </div>
          <div class="footer-inner-cell footer-inner-cell-socials">
            <h3>Social</h3>
            <ul class="footer-socials">
              <li>
                <a class="social-facebook a-js" href="https://www.facebook.com/">Faceboook</a>
              </li>
              <li>
                <a class="social-google-plus a-js"
                  href="https://plus.google.com/+Megaprof/">Google</a>
              </li>
            </ul>
          </div>
          <div class="footer-inner-cell footer-inner-cell-profs">
            <h3>Professeurs</h3>
            <ul class="list">
              <li>
                <a href="/" title="">Toutes les matières</a>
              </li>
            </ul>
          </div>
          <div class="footer-inner-cell footer-inner-cell-about">
            <h3>A propos</h3>
            <ul class="list">
              <li>
                <a href="/" title="">Mentions légales</a>
              </li>
              <li>
                <a href="/" title="">Le mag We Love Prof</a>
              </li>
              <li>
                <a href="/" title="">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
  @include('includes/toastr/toastr')

</html> 
