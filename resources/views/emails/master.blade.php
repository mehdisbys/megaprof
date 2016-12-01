<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Cours particuliers Megaprof - Trouvez un professeur particulier</title>
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

<!-- {!! HTML::script("js/bootstrap.min.js") !!} -->

    <!-- TODO convert to sass files   -->
</head>

<body>
<div id="fb-root"></div>
<div class="header">
    <div class="wrapper">
        <div class="header-inner">
            <div class="header-inner-cell header-inner-cell-logo">
                <a class="header-logo header-logo-normal"
                   href="/" title="Accueil Taelam">
                    <img src="http://taelam.com/temp-images/megaprof.png" width="170"
                         alt="Cours particuliers avec Taelam"/>
                </a>
            </div>

            <div class="header-inner-cell header-inner-cell-menu">
                <div class="header-menu-inner"></div>
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

<div class="footer"></div>

</body>
@include('includes/toastr/toastr')

</html>