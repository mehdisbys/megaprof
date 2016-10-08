@extends('layouts.master')

@section('content')
  {!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
  {!! HTML::style("temp-css/awesomplete.css") !!}
  {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR&amp;key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
  {!! HTML::script("js/locationpicker.jquery.js") !!}
  {!! HTML::script("js/jquery.geocomplete.min.js") !!}
  {!! HTML::script("js/jquery.form.min.js") !!}

<div class="home-search">
  <h1 class="search-title">Trouvez le professeur parfait</h1>

    <div class="home-search-form-inner autocomplete">
    <form action="/search" id="search_form" class="home-search-form autocomplete-form">
      {!! csrf_field() !!}
        <div class="home-search-field-wrapper">
            <input
                id="subject_input"
                class="awesomplete home-search-input autocomplete-input"
                placeholder="Que souhaitez-vous apprendre ?"
                data-minchars="1"
                data-autofirst="1"
                data-list="{!! $subsubjects !!}"
                name="subject"
                type="text"
                autocomplete="off"
                aria-autocomplete="list"/>
        </div>

        <div class="home-search-field-wrapper">
            <input id="location_input"
                class="home-search-input"
                placeholder="Ville où le cours a lieu"
                name="subject" type="text" />
        </div>

        <div class="home-search-button-wrapper">
            <button id="submit-btn" class="button" type="submit"> submit</button>
        </div>
        </div>
        <div class="location-details no-visibility">
          {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
          {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
        </div>
    </form>
<script>

$(document).ready(function () {
    $("#submit-btn").click(function (event) {
        event.preventDefault();
        var subject = $("#subject_input").val();
        var loc = $("#location_input").val();
        if (subject.length < 2 || loc.length < 2) return;
        url = "/annonces/" +  subject  + "/" + loc;
        url = url.replace(/ /g, '-');
        window.location.assign(url);
    });

  // Geocompletion
  $('#location_input').geocomplete({types: ['(cities)'], details: ".location-details",});
});

</script>
</div>
<div class="section reinsurance">
  <div class="wrapper">
    <div class="col-md-7 col-md-offset-4 topmargin-sm">

      <h2>Les dernières annonces publiées</h2>
      <div class="clearfix"></div>
        @foreach($latestAdverts as $advert)
            @include('main.advertPreview', ['trimChar' => 150])
        @endforeach
    </div>


    <div class="col-md-7 col-md-offset-4 topmargin-sm">
      <h2>Les matières les plus populaires</h2>
      <div class="clearfix"></div>
      @foreach($popularSubjects as $subject)
        <div class="subject-{{$subject['subject_id']}}"> <a href="/annonces/{{$subject['name']}}">{{ $subject['name'] }}</a>  - {{$subject['count']}} annonces</div>
      @endforeach
    </div>

  </div>
</div>
<div class="section section-odd home-profs">
  <div class="wrapper">
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
      <a class="button a-js" href="/annonces">Trouvez votre professeur</a>
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
                    <a href=""><strong>Mehdi S</strong></a>
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
  @endsection

