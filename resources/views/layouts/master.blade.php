<!-- <!DOCTYPE html> <!--[if IEMobile 7 ]>
<html lang="fr" class="iem7">
<![endif]--> <!--[if lt IE 7 ]>
<html lang="fr" class="ie6 oldie">
<![endif]--> <!--[if IE 7 ]>
<html lang="fr" class="ie7 oldie">
<![endif]--> <!--[if IE 8 ]>
<html lang="fr" class="ie8 oldie">
<![endif]--> <!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]> <!-->
<html lang="fr"> <!--<![endif]-->
-->
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

    <link rel="apple-touch-icon" sizes="57x57" href=""/>
    <link rel="apple-touch-icon" sizes="60x60" href=""/>
    <link rel="icon" sizes="32x32" type="image/png" href=""/>
    <link rel="icon" sizes="16x16" type="image/png" href=""/>
    {!! HTML::style('/main.css') !!}

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
                <img src="/temp-images/megaprof.png"
                         srcset="/temp-images/megatprof.png 1x, /temp-images/megatprof@2x.png 2x" width="170"
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
                        </div>

            <!-- <div class="header&#45;inner&#45;cell header&#45;inner&#45;cell&#45;button"> -->
            <!--     <a class="button" href="#">Donner des cours</a> -->
            <!-- </div> -->
        </div>
    </div>
</div>
<div class="page">
    @section('content')

        <div class="home-search">
            <h1 class="search-title">Trouvez le professeur parfait</h1>
            <form class="home-search-form autocomplete-form" method="post" action="/search">
                {!! csrf_field() !!}
                <div class="home-search-form-inner autocomplete">
                    <input class="home-search-input autocomplete-input" type="text"
                           placeholder="Que souhaitez-vous apprendre ?" name="search" autocomplete="off"/>
                    <button class="home-search-submit" type="submit"></button>
                    <div class="home-search-results autocomplete-results"></div>
                </div>
            </form>
        </div>
        <div class="section reinsurance">
            <div class="wrapper">
                <div class="reinsurance-inner">
                    <div class="reinsurance-title">
                        <h2>Vous allez <br/> aimer apprendre</h2>
                    </div>
                    <div class="reinsurance-item measure">
                        <div class="reinsurance-item-icon"></div>
                        <h3 class="reinsurance-item-title">Sur mesure</h3>
                        <p class="reinsurance-item-description">153 212 élèves ont déjà appris avec Megaprof</p>
                    </div>
                    <div class="reinsurance-item fast">
                        <div class="reinsurance-item-icon"></div>
                        <h3 class="reinsurance-item-title">Rapide</h3>
                        <p class="reinsurance-item-description">Trouvez votre professeur dans la journée</p>
                    </div>
                    <div class="reinsurance-item economical">
                        <div class="reinsurance-item-icon"></div>
                        <h3 class="reinsurance-item-title">Économique</h3>
                        <p class="reinsurance-item-description">Travaillez en direct, sans intermédiaire</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-odd home-profs">
            <div class="wrapper">
                <div class="filters">
                    <div class="home-profs-filters inline-block-grid filters-buttons">
                        <button class="home-profs-filter" type="button" data-filter="#82b8eb">
                            <span class="category-marker" style="color:#82b8eb;"> </span>Scolaire
                        </button>
                        <button class="home-profs-filter" type="button" data-filter="#ffd267">
                            <span class="category-marker" style="color:#ffd267;"> </span>Langues
                        </button>
                        <button class="home-profs-filter" type="button" data-filter="#e88f67">
                            <span class="category-marker" style="color:#e88f67;"> </span>Musique
                        </button>
                        <button class="home-profs-filter" type="button" data-filter="#8743d1">
                            <span class="category-marker" style="color:#8743d1;"> </span>Sports
                        </button>
                        <button class="home-profs-filter" type="button" data-filter="#ff328e">
                            <span class="category-marker" style="color:#ff328e;"> </span>Art & loisirs
                        </button>
                        <button class="home-profs-filter active" type="button"><span
                                    class="category-marker neutral"> </span>Tous
                        </button>
                    </div>
                    <div class="home-profs-filters-dropdown">
                        <select class="filters-dropdown">
                            <option>Tous</option>
                            <option value="#82b8eb">Scolaire</option>
                            <option value="#ffd267">Langues</option>
                            <option value="#e88f67">Musique</option>
                            <option value="#8743d1">Sports</option>
                            <option value="#ff328e">Art & loisirs</option>
                        </select>
                    </div>
                    <div class="home-profs-items-container">
                        <ul class="home-profs-items inline-block-grid filters-results"></ul>
                        <ul class="filters-items-wrapper">

                            <li class="home-profs-item">
                                <a class="home-profs-item-anchor" href="" title="Professeur de Mathématiques à Paris">
                                    <span class="home-profs-item-gradient"> </span>
                                    <img class="home-profs-item-img" alt="Professeur de Mathématiques à Paris"
                                         src="/temp-images/professeur.jpg"/>
                                </a>
                                <div class="home-profs-item-description">
                                    <div class="home-profs-item-name">Professeur Name</div>
                                    <div class="home-profs-item-subject">
                                        <span class="category-marker" style="color:#82b8eb;"> </span> Mathématiques
                                    </div>
                                </div>
                            </li>

                            <li class="home-profs-item">
                                <a class="home-profs-item-anchor" href="" title="Professeur de Mathématiques à Paris">
                                    <span class="home-profs-item-gradient"> </span>
                                    <img class="home-profs-item-img" alt="Professeur de Mathématiques à Paris"
                                         src="/temp-images/professeur.jpg"/>
                                </a>
                                <div class="home-profs-item-description">
                                    <div class="home-profs-item-name">Professeur Name</div>
                                    <div class="home-profs-item-subject">
                                        <span class="category-marker" style="color:#82b8eb;"> </span> Mathématiques
                                    </div>
                                </div>
                            </li>

                            <li class="home-profs-item">
                                <a class="home-profs-item-anchor" href="" title="Professeur de Mathématiques à Paris">
                                    <span class="home-profs-item-gradient"> </span>
                                    <img class="home-profs-item-img" alt="Professeur de Mathématiques à Paris"
                                         src="/temp-images/professeur.jpg"/>
                                </a>
                                <div class="home-profs-item-description">
                                    <div class="home-profs-item-name">Professeur Name</div>
                                    <div class="home-profs-item-subject">
                                        <span class="category-marker" style="color:#82b8eb;"> </span> Mathématiques
                                    </div>
                                </div>
                            </li>

                            <li class="home-profs-item">
                                <a class="home-profs-item-anchor" href="" title="Professeur de Mathématiques à Paris">
                                    <span class="home-profs-item-gradient"> </span>
                                    <img class="home-profs-item-img" alt="Professeur de Mathématiques à Paris"
                                         src="/temp-images/professeur.jpg"/>
                                </a>
                                <div class="home-profs-item-description">
                                    <div class="home-profs-item-name">Professeur Name</div>
                                    <div class="home-profs-item-subject">
                                        <span class="category-marker" style="color:#82b8eb;"> </span> Mathématiques
                                    </div>
                                </div>
                            </li>

                            <li class="home-profs-item">
                                <a class="home-profs-item-anchor" href="" title="Professeur de Mathématiques à Paris">
                                    <span class="home-profs-item-gradient"> </span>
                                    <img class="home-profs-item-img" alt="Professeur de Mathématiques à Paris"
                                         src="/temp-images/professeur.jpg"/>
                                </a>
                                <div class="home-profs-item-description">
                                    <div class="home-profs-item-name">Professeur Name</div>
                                    <div class="home-profs-item-subject">
                                        <span class="category-marker" style="color:#82b8eb;"> </span> Mathématiques
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <p class="align-center">Sélectionnez vous-même et librement vos professeurs parmi plus de 250 000
                    profils vérifiés et recommandés.</p>
                <div class="align-center">
                    <button class="button a-js" type="button" data-href="/search.html">Trouvez votre professeur</button>
                </div>
            </div>
        </div>
        <div class="section home-how">
            <div class="wrapper">
                <h2 class="section-title">Megaprof, comment ça marche ?</h2>
                <div class="table how_it_works">
                    <div class="cell">
                     <span class="cupcake">
                     </span>
                    </div>
                    <div class="cell">
                        <ul>
                            <li>
                           <span
                                   class="number">1</span>
                                <div>
                                    <span>Trouvez des professeurs incroyables</span>
                                </div>
                                <div>
                                    <p>Sélectionnez la perle rare parmi une liste d’enseignants vérifiés par nos soins,
                                        évalués par leurs anciens élèves et à proximité de chez vous.</p>
                                </div>
                            </li>
                            <li>
                           <span
                                   class="number">2</span>
                                <div>
                                    <span>Réservez un cours facilement</span>
                                </div>
                                <div>
                                    <p>Contactez les professeurs directement : présentez-vous, décrivez vos attentes et
                                        réservez votre premier cours. Les professeurs confirment et planifient les cours
                                        directement avec vous.</p>
                                </div>
                            </li>
                            <li>
                           <span
                                   class="number">3</span>
                                <div>
                                    <span>Apprenez en toute confiance</span>
                                </div>
                                <div>
                                    <p>Vous ne payez rien tant que vous n’avez pas trouvé votre professeur idéal. Une
                                        fois trouvé, Megaprof prélèvera une seule et unique fois 19 euros, jamais
                                        avant.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div
                id="home-testimonies" class="component-testimonies section">
            <div
                    class="wrapper">
                <h2 class="section-title">Nos anciens élèves évaluent leurs professeurs</h2>
                <p
                        class="align-center">Pour être certain de la qualité de nos professeurs, nous collectons les
                    avis des anciens élèves.</p>
                <ul>
                    <li>
                        <div class="component-testimony component-testimony-student">
                            <div class="component-testimony-inner">
                                <div class="component-testimony-picture">
                                    <img src="/temp-images/professeur.jpg" title=""/>
                                </div>
                                <div class="component-testimony-content">
                                    <div class="component-testimony-text">
                                        <p>Aline est mega cool et douée, cours très intéressant</p>
                                    </div>
                                    <div class="component-testimony-more">
                                        <div class="component-testimony-author">
                                    <span>
                                    <a href="/">
                                        <strong>Joe</strong>, Smith</a>
                                    </span>
                                        </div>
                                        <div class="component-testimony-date">2 days ago</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="component-testimony component-testimony-teacher">
                            <div class="component-testimony-inner">
                                <div class="component-testimony-picture">
                                    <img src="/temp-images/professeur.jpg" title=""/>
                                </div>
                                <div class="component-testimony-content">
                                    <div class="component-testimony-text">
                                        <p>Merci! </p>
                                    </div>
                                    <div class="component-testimony-more">
                                        <div class="component-testimony-author">
                                    <span>
                                    <a href="">
                                        <strong>Jane Smith</strong>, Professeur</a>
                                    </span>
                                        </div>
                                        <div class="component-testimony-date"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="component-testimony component-testimony-student">
                            <div class="component-testimony-inner">
                                <div class="component-testimony-picture"></div>
                                <div class="component-testimony-content">
                                    <div class="component-testimony-text">
                                        <p>Michel est une bonne prof, dynamique et très sympathique :) Je
                                            recommande </p>
                                    </div>
                                    <div class="component-testimony-more">
                                        <div class="component-testimony-author">
                                    <span>
                                    <a href=""><strong>Medhi S</strong></a>
                                    </span>
                                        </div>
                                        <div class="component-testimony-date">Il y a 1 jour</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="component-testimony component-testimony-teacher">
                            <div class="component-testimony-inner">
                                <div class="component-testimony-picture">
                                </div>
                                <div class="component-testimony-content">
                                    <div class="component-testimony-text">
                                        <p>très bien</p>
                                    </div>
                                    <div class="component-testimony-more">
                                        <div class="component-testimony-author">
                                    <span>
                                    <a href="">
                                        <strong>Maxi priest</strong>, Professeur</a>
                                    </span>
                                        </div>
                                        <div class="component-testimony-date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div
                class="section home-share">
            <div
                    class="wrapper">
                <h2 class="section-title">Partagez vos connaissances avec Megaprof</h2>
                <div class="home-share-opinion">
                    <ul class="rating align-center">
                        <li class="star-full"></li>
                        <li class="star-full"></li>
                        <li class="star-full"></li>
                        <li class="star-full"></li>
                        <li class="star-full"></li>
                    </ul>
                    <blockquote>
                        <p class="home-share-opinion-content">
                            Je me suis inscrit sur Megaprof il y a un peu plus d’un an pour gagner quelques euros par
                            mois car je n’avais pas de travail.<br/>
                            <br/>
                            Je reçois aujourd'hui vos demandes de cours et j’ai la chance d’avoir des élèves très
                            satisfaits et réguliers. J’ai en général 5 à 10 rendez-vous avec chacun.<br/>
                            <br/>
                            Merci encore à toute l'équipe !
                        </p>
                    </blockquote>
                    <div class="home-share-opinion-author"></div>
                </div>
                <div
                        class="home-share-arguments">
                    <div
                            class="component-cols component-cols-big">
                        <div
                                class="wrapper">
                            <ul>
                                <li class="component-col">
                                    <div class=" component-col-icon">
                                        <div class="icon icon-watch"></div>
                                    </div>
                                    <h3 class="component-col-title">Gain de temps pour<br/> trouver des élèves</h3>
                                    <p class="component-col-content"> 12 000 recherches d'élèves<b/> chaque jour.
                                    </p>
                                </li>
                                <li class="component-col">
                                    <div class=" component-col-icon">
                                        <div class="icon icon-coins">
                                        </div>
                                    </div>
                                    <h3 class="component-col-title">Fixez<br/>vos tarifs</h3>
                                    <p class="component-col-content">
                                        Travaillez en direct<br/>
                                        avec vos élèves
                                    </p>
                                </li>
                                <li class="component-col">
                                    <div class=" component-col-icon">
                                        <div class="icon icon-cloth"></div>
                                    </div>
                                    <h3 class="component-col-title">Rejoignez<br/>l'aventure</h3>
                                    <p class="component-col-content"> Inscription gratuite<br/> pour les professeurs
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="align-center">
                    <button class="button a-js" type="button" data-href="/inscription.html">Devenez professeur</button>
                </div>
                <p class="align-center">Vous souhaitez donner des cours ? Partagez vos connaissances ou votre
                    passion</p>
            </div>
        </div>
        <div class="section section-odd home-subjects">
            <div class="wrapper">
                <h2 class="section-title">Les cours particuliers par matières</h2>
                <ul class="home-subjects-items">
                    <li class="home-subjects-item growing-card no-margin">
                        <div class="home-subjects-item-img fourth">
                        </div>
                        <h3 class="home-subjects-item-title">Scolaire</h3>
                        <p class="home-subjects-item-description">
                            La littérature n'est pas en reste avec les.
                        </p>
                    </li>
                    <li class="home-subjects-item growing-card ">
                        <div class="home-subjects-item-img second">
                        </div>
                        <h3 class="home-subjects-item-title">Langues</h3>
                        <p class="home-subjects-item-description">
                            Envie d'apprendre une langue, un dialecte
                        </p>
                    </li>
                    <li class="home-subjects-item growing-card ">
                        <div class="home-subjects-item-img third">
                        </div>
                        <h3 class="home-subjects-item-title">Musique</h3>
                        <p class="home-subjects-item-description">
                            Vous serez le prochain Mozart!
                        </p>
                    </li>
                    <li class="home-subjects-item growing-card no-margin">
                        <div
                                class="home-subjects-item-img fifth">
                        </div>
                        <h3 class="home-subjects-item-title">Sports</h3>
                        <p class="home-subjects-item-description">
                            Un esprit sain dans un corps sain !
                        </p>
                    </li>
                    <li class="home-subjects-item growing-card ">
                        <div class="home-subjects-item-img first"></div>
                        <h3 class="home-subjects-item-title">Art & loisirs</h3>
                        <p class="home-subjects-item-description">
                            Les arts et les loisirs peuvent faire l'objet de cours particuliers.
                        </p>
                    </li>
                    <li class="home-subjects-item growing-card ">
                        <div class="home-subjects-item-img sixth"></div>
                        <h3 class="home-subjects-item-title">Danse</h3>
                        <div class="home-subjects-item-description">
                            <p>De nombreuses danses sont enseignées par nos professeurs.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div
                class="section home-cities">
            <div
                    class="wrapper">
                <h2 class="section-title">Les cours particuliers par ville</h2>
                <p class="align-center">
                    <span>Les principales villes, </span>
                    <span> <strong>en France</strong> </span>
                </p>
                <ul class="home-cities-main-items inline-block-grid">
                    <li class="home-cities-main-item  first">
                        <a class="home-cities-main-anchor" href="#" title="Cours particuliers Paris">
                            <span class="home-cities-main-img first"> </span>
                            <div class="home-cities-main-name">Paris</div>
                            <div class="home-cities-main-profs">0 professeurs</div>
                        </a>
                    </li>
                    <li class="home-cities-main-item ">
                        <a class="home-cities-main-anchor" href="#" title="Cours particuliers Lille">
                        <span class="home-cities-main-img second">
                        </span>
                            <div class="home-cities-main-name">Lille</div>
                            <div class="home-cities-main-profs">0 professeurs</div>
                        </a>
                    </li>
                    <li class="home-cities-main-item ">
                        <a class="home-cities-main-anchor" href="#" title="Cours particuliers Bordeaux">
                            <span class="home-cities-main-img third"> </span>
                            <div class="home-cities-main-name">Bordeaux</div>
                            <div class="home-cities-main-profs">0 professeurs</div>
                        </a>
                    </li>
                    <li class="home-cities-main-item ">
                        <a class="home-cities-main-anchor" href="#" title="Cours particuliers Lyon">
                            <span class="home-cities-main-img fourth"></span>
                            <div class="home-cities-main-name">Lyon</div>
                            <div class="home-cities-main-profs">0 professeurs</div>
                        </a>
                    </li>
                    <li class="home-cities-main-item ">
                        <a class="home-cities-main-anchor" href="#" title="Cours particuliers Marseille">
                            <span class="home-cities-main-img fifth"> </span>
                            <div class="home-cities-main-name">Marseille</div>
                            <div class="home-cities-main-profs">0 professeurs</div>
                        </a>
                    </li>
                </ul>
                <ul class="home-cities-others-items inline-block-grid">
                    <li class="home-cities-others-item  first">
                        <h3 class="home-cities-others-title first"> Nord-Ouest
                            <span class="home-cities-others-picto"> </span>
                        </h3>
                        <ul class="unstyled-list">
                            <li>
                                <a class="home-cities-others-city" href="#" title="Cours particuliers Le Havre">
                                    <strong>Le Havre</strong> <em>(0 profs)</em>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="home-cities-others-item">
                        <h3 class="home-cities-others-title second">
                            Nord-Est
                            <span class="home-cities-others-picto"> </span>
                        </h3>
                        <ul class="unstyled-list">
                            <li>
                                <a class="home-cities-others-city" href="#" title="Cours particuliers Amiens">
                                    <strong>Amiens</strong> <em>(0 profs)</em>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                            class="home-cities-others-item ">
                        <h3 class="home-cities-others-title third">
                            Centre
                            <span class="home-cities-others-picto"></span>
                        </h3>
                        <ul class="unstyled-list">
                            <li>
                                <a class="home-cities-others-city" href="#" title="Cours particuliers Clermont-Ferrand">
                                    <strong>Clermont-Ferrand</strong> <em>(0 profs)</em>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                            class="home-cities-others-item ">
                        <h3 class="home-cities-others-title fourth">
                            Sud-Ouest
                        <span
                                class="home-cities-others-picto">
                        </span>
                        </h3>
                        <ul class="unstyled-list">
                            <li>
                                <a class="home-cities-others-city" href="#" title="Cours particuliers Montpellier">
                                    <strong>Montpellier</strong> <em>(0 profs)</em>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="home-cities-others-item ">
                        <h3 class="home-cities-others-title fifth">
                            Sud-Est
                            <span class="home-cities-others-picto"> </span>
                        </h3>
                        <ul class="unstyled-list">
                            <li>
                                <a class="home-cities-others-city" href="#" title="Cours particuliers Toulon">
                                    <strong>Toulon</strong> <em>(0 profs)</em>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="section-odd home-mag">
            <div class="wrapper">
                <h2 class="section-title">Megaprof </h2>
                <p class="align-center">
                <p>Le magazine qui aime <strong>les profs</strong>, les élèves, les cours particuliers et le partage de
                    connaissances</p>
                </p>

                <div class="home-mag-cells">
                    <div class="home-mag-cell growing-card">
                        <div class="home-mag-cell-content">
                            <a class="home-mag-cell-question" href="">Où Apprendre l’Allemand à Lille ?</a>
                            <div class="home-mag-cell-answer"> La ville de Lille est souvent</div>
                        </div>
                    </div>

                    <div class="home-mag-cell growing-card">
                        <div class="home-mag-cell-profile-picture">
                            <img src="/temp-images/professeur.jpg" alt="Où Apprendre l’Allemand à Lille ?"/>
                        </div>
                        <div class="home-mag-cell-content">
                            <a class="home-mag-cell-question" href="#">Comment Apprendre l’Arabe aux Enfants ?</a>
                            <div class="home-mag-cell-answer"> Posséder une double cu...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @show
</div>

<div class="notification valid hidden" id="errorNotification" data-timeout="15000">
    <div class="wrapper">
        <p class="notification-text"></p>
        <div class="notification-close"></div>
    </div>
</div>
<div
        class="footer">
    <div
            class="wrapper">
        <div
                class="footer-buttons align-center">
            <button class="button a-js" type="button" data-href="/search.html">Trouvez votre professeur</button>
            <button class="button a-js" type="button" data-href="/inscription.html">Donner des cours</button>
        </div>
        <div
                class="footer-inner">
            <div
                    class="footer-inner-top">
                <div
                        class="footer-inner-cell footer-inner-cell-confidence"
                        itemtype="http://data-vocabulary.org/Review-aggregate" itemscope="">
                    <h3>Confiance</h3>
                    <ul
                            class="rating" style="padding: 0 0 5px 0">
                        <li class="star-full">
                        </li>
                        <li class="star-full">
                        </li>
                        <li class="star-full">
                        </li>
                        <li class="star-full">
                        </li>
                        <li class="star-half">
                        </li>
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
