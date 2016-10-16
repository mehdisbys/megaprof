@extends('layouts.master')

@section('content')
{!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
{!! HTML::style("temp-css/awesomplete.css") !!}
{!! HTML::style("css/fa/css/font-awesome.css") !!}
{!! HTML::style("css/slick.css") !!}
{!! HTML::style("css/slick-theme.css") !!}

{!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR&amp;key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
{!! HTML::script("js/locationpicker.jquery.js") !!}
{!! HTML::script("js/jquery.geocomplete.min.js") !!}
{!! HTML::script("js/jquery.form.min.js") !!}

<!-- one ============= -->
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
        name="city" type="text" />
      </div>

      <div class="home-search-button-wrapper">
        <button id="submit-btn" class="button" type="submit"> Chercher</button>
      </div>
      <div class="location-details no-visibility">
        {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
        {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
      </div>
    </form>
  </div>
</div>

<!-- two ============= -->
<div class="section reinsurance">
  <div class="wrapper">

    <div class="">
      <h2>Les dernières annonces publiées</h2>
      <div class="carousel">
        @foreach($latestAdverts as $advert)
        @include('main.advertPreview', ['trimChar' => 350])
        @endforeach
      </div>
    </div>

    <!-- start of components  -->
    <div class="scrolling-pane topmargin-lg">
      <h2>Les matières les plus populaires</h2>
      <ul id="pane-a">
        @foreach($popularSubjects->take(5) as $subject)
        <li class="scroll-items" id="subject-{{$subject['parent_id']}}">
          <div class="fa {{$subject['class']}} fa-3x"></div>
          <a href="/annonces/{{$subject['name']}}">{{ $subject['name'] }} - {{$subject['count']}} annonces </a>
        </li>
        @endforeach
      </ul>

      <ul id="pane-b">
        @foreach($popularSubjects->take(-5) as $subject)
        <li class="scroll-items" id="subject-{{$subject['parent_id']}}">
          <div class="fa {{$subject['class']}} fa-3x "></div>
          <a href="/annonces/{{$subject['name']}}">{{ $subject['name'] }} - {{$subject['count']}} annonces </a>
        </li>
        @endforeach
      </ul>
    </div>
    <!-- end of components  -->
  </div>
</div>


<!-- three ============= -->
<div class="section home-how">
  <div class="wrapper">
    <h2 class="section-title">Megaprof, comment ça marche ?</h2>
    <div class="table how_it_works">
      <div class="cell"> <span class="cupcake"> </span> </div>
      <div class="cell">
        <ul>
          <li>
            <span class="number">1</span> <div>
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
            <div> <span>Apprenez en toute confiance</span>
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


<!-- four ============= -->
<div class="section home-share">
  <div class="wrapper">
    <h2 class="section-title">Partagez vos connaissances avec Megaprof</h2>
    <div class="home-share-opinion">
      <ul class="rating align-center">
        <li class="star-full">&nbsp;</li>
        <li class="star-full">&nbsp;</li>
        <li class="star-full">&nbsp;</li>
        <li class="star-full">&nbsp;</li>
        <li class="star-full">&nbsp;</li>
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
    </div>
    <div class="home-share-arguments">
      <div class="component-cols component-cols-big">
        <div class="wrapper">
          <ul>
            <li class="component-col">
              <div class=" component-col-icon">
                <div class="icon icon-watch"></div>
              </div>
              <h3 class="component-col-title">Gain de temps pour<br/> trouver des élèves</h3>
              <p class="component-col-content"> 12 000 recherches d'élèves<br/> chaque jour.  </p>
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

  {!! HTML::script("js/slick.min.js") !!}

  <!-- five ============= -->
  <script>
    $(document).ready(function () {

      $('.carousel').slick({
        autoplay : true,
        autoplaySpeed : 50000,
        arrows: false,
        dots: true,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite : true
      });

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
      $('#location_input').geocomplete({types: ['(cities)'], componentRestrictions: {country: "ma"},  details: ".location-details"});

      var abba = true;
      $('#pane-b').hide();
      function toggleFade () {
        if (abba) {
          $('#pane-a').fadeOut('slow', function (){
            $('#pane-b').fadeIn('slow');
            abba = false;
          });
        } else {
          $('#pane-b').fadeOut('slow', function () {
            $('#pane-a').fadeIn('slow');
            abba = true;
          });
        }
      };
      setInterval(toggleFade, 7000);
    });

  </script>

  @endsection

