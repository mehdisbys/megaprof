<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cours particuliers au Maroc | Blog Taelam">
    <meta name="author" content="">

    <title>Taelam | Blog</title>

{!! HTML::style('/css/all.css') !!}
{!! HTML::style('css/fa/css/font-awesome.min.css')!!}

<!-- Theme CSS -->
    <link href="/css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/">Taelam</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/blog">Accueil</a>
                </li>
                <li>
                    <a href="/">Taelam</a>
                </li>

                <li>
                    <a href="/nouvelle-annonce-1">Donner des cours</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('/images/articles/cloud-header.jpeg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h2>Apprenez sans limites !</h2>
                    <h4 class="suheading">Nos articles, astuces et conseils pour réussir tous vos objectifs.</h4>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                @foreach($articles as $article)

                    <div class="post-preview">

                        <a href="/blog/{{$article->slug}}">
                            <h2 class="post-title">
                                {{$article->title}}
                            </h2>
                            <h3 class="post-subtitle">
                                {{str_limit($article->tagline, 70)}}
                            </h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</article>

<hr>

<!-- Footer -->
<footer class="footer-div topmargin-sm row col-md-12" id="footer-div">
    <div class="container">
        <div class="row">

            <div class="col-md-2 col-sm-6 paddingtop-bottom col-md-offset-1">
                <div class="text-center center-block">

                    <h6 class="heading7">À PROPOS</h6>
                    <p><a href="/faq"> Foire Aux Questions</a></p>
                    <p><a href="/nouvelle-annonce-1"> Créer une annonce</a></p>
                    <p><a href="/cgu"> Conditions Générales</a></p>
                    <p><a href="/professeur"> Devenir Professeur</a></p>
                    <p><a href="#"> Qui sommes-nous</a></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 paddingtop-bottom">

                <div class="text-center center-block">
                    <h6 class="heading7">SUIVEZ-NOUS</h6>
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

                    <h6 class="heading7">TAELAM</h6>
                    <img class="flag" src="/css/flags/flags/4x3/ma.svg" alt="Drapeau Marocain">

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

                    <!--  <div><i class="fa fa-newspaper-o"></i> <a href="">Presse</a></div> -->
                    <p><i class="fa fa-envelope"></i> <a class="mouse-hand" data-toggle="modal" data-target="#contact"
                                                         data-original-title>Contactez-nous</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

@include('main.partials.contactForm')


{!! HTML::script("js/jquery.js") !!}
{!! HTML::script("js/bootstrap.min.js") !!}

<!-- Theme JavaScript -->
<script src="/js/clean-blog.min.js"></script>

</body>

</html>
