@extends('layouts.master')

@section('content')
    {!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
    {!! HTML::style("js/awesomplete/awesomplete.css") !!}
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::script("js/jquery.geocomplete.min.js") !!}
    {!! HTML::script("js/jquery.form.min.js") !!}
<div class="home-search">
  <form class="home-search-form autocomplete-form" method="post" action="/search">
    {!! csrf_field() !!}
    <div class="home-search-form-inner autocomplete awesomplete">
        {!! Form::open(['url' => '/search', 'id' => 'search_form']) !!}
        {!! Form::input('text', 'subject', $selectedSubject,
            [ 'class' => 'awesomplete sm-form-control home-search-input autocomplete-input',
                'placeholder' => 'Que souhaitez-vous apprendre ?',
                'data-minchars' => 1, 'data-autofirst' => true,
                'data-list' => $subsubjects,
                'style' => 'width:100%;',
                'id' => 'subject_input'
            ]) 
        !!}
    <button class="home-search-submit" type="submit"></button>
    <ul hidden="">
        <li aria-selected="true">holder</li>
    </ul>
</form>
</div>

    <div class="">
        {!! Form::open(['url' => '/search', 'id' => 'search_form']) !!}
        <div class="">
            <div id="radius_input" class="no-visibility">
                <span> Je peux me déplacer dans un rayon de </span>
                <div class="clearfix"></div>
                <label class="search-radio">
                    <input name="radius" value="1" type="radio"/> 5 km
                </label>
                <label class="search-radio">
                    <input name="radius" value="2" type="radio"/> 10 km
                </label>
                <label class="search-radio">
                    <input name="radius" value="3" type="radio"/> 20 km
                </label>
                <label class="search-radio">
                    <input name="radius" value="4" type="radio"/> Uniquement à domicile
                </label>
            </div>

            <div id="teacher_gender" class="topmargin-sm">
                <span>Je préfère un professeur</span>

                <label class="search-radio">
                    <input name="gender" value="man" type="radio">
                     Homme
                </label>
                <label class="search-radio">
                    <input name="gender" value="woman" type="radio">
                    Femme
                </label>

                <label class="search-radio">
                    <input name="gender" value="both" type="radio">
                    Les deux me vont
                </label>
            </div>

            <div class="location-details no-visibility">
                {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
                {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
            </div>

            <div class="topmargin-lg"></div>

            <div id="subject" class="button button-3d button-small button-rounded button-aqua no-visibility"></div>
            <div id="city" class="button button-3d button-small button-rounded button-yellow no-visibility"></div>
            <div id="radius" class="button button-3d button-small button-rounded button-amber no-visibility"></div>
        </div>
        <div class="col-md-1 pull-left">
            <span>
                <button type="submit" class="button button-3d button-small button-rounded button-green pull-right">
                    <span class="icon-search3"></span>
                </button>
            </span>
        </div>
        {!! Form::close() !!}
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

       
        <!-- optional to show advert count  -->
            @if(count($adverts) == 0)
                <div>Malheuresement aucune annonce correspondant à vos critères n'a été trouvée. Réessayez avec d'autres options</div>
            @else
                <div id="count_results" class="topmargin-sm bottommargin-sm">
                    <span id="count_text">{{ count($adverts) }} Items found</span>
                </div>
                <div id="search_results"></div>
                @include('main.multipleAdvertPreview')
        @endif
            </div>
        <!-- optional to show advert count  -->

      </div>
    </div>
    <p class="align-center">Sélectionnez vous-même et librement vos professeurs parmi plus de 250 000
      profils vérifiés et recommandés.</p>
    <div class="align-center">
      <button class="button a-js" type="button" data-href="/search.html">Trouvez votre professeur</button>
    </div>
  </div>
</div>
<div id="home-testimonies" class="component-testimonies section">
  <div class="wrapper">
    <h2 class="section-title">Nos anciens élèves évaluent leurs professeurs</h2>
    <p class="align-center">Pour être certain de la qualité de nos professeurs, nous collectons les
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
    <div class="footer-buttons align-center">
      <button class="button a-js" type="button" data-href="/search.html">Trouvez votre professeur</button>
      <button class="button a-js" type="button" data-href="/inscription.html">Donner des cours</button>
    </div>
  </div>



<script>
/** 
 * TODO -- refactor javascript 
 * there is a bit too much going on here
 *
 * */

$(document).ready(function () {
    return;
    $('#search_form').ajaxForm(updatePage);

            $('#subject').on('click', function(){
                $(this).addClass('no-visibility');
                makeVisible(['subject_input']);
                makeInvisible(['city_input', 'radius_input']);
            });

            $('#city').on('click', function(){
                $(this).addClass('no-visibility');
                makeVisible(['city_input']);
                makeInvisible(['subject_input', 'radius_input']);
            });

            $('#radius').on('click', function(){
                $(this).addClass('no-visibility');
                makeVisible(['radius_input']);
                makeInvisible(['subject_input', 'city_input']);
            });

            function updatePage(data)
            {
                $("#count_text").html(data.count);
                $("#search_results").html(data.results);
                updateForm(data);
            }

            function updateForm(data)
            {
                if(data.params.selectedSubject)
                {
                    $("#subject").html(data.params.selectedSubject);
                    makeVisible(['subject','city_input']);
                    makeInvisible(['subject_input']);
                }

                if(data.params.city)
                {
                    $("#city").html(data.params.city);
                    makeVisible(['city','radius_input']);
                    makeInvisible(['city_input']);
                }

                if(data.params.selectedRadius)
                {
                    $("#radius").html(data.params.selectedRadius);
                    makeVisible(['radius']);
                    makeInvisible(['radius_input']);
                }
            }

            // helpers

            function makeVisible(selectors)
            {
                selectors.map(function (item) {
                    $('#' + item).removeClass('no-visibility');
                });
            }

            function makeInvisible(selectors)
            {
                selectors.map(function (item) {
                    $('#' + item).addClass('no-visibility');
                });
            }
            // Geocompletion
            $('#city_input').geocomplete(
                    {
                        types: ['(cities)'],
                        details: ".location-details",
                    });
        });

    </script>
@endsection
