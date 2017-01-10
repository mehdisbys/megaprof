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
        class="home-search-input autocomplete-input"
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
  <div id="howto-btn" class="howto"><a href="#howto" class="howto-link">Comment ça marche</a></div>
</div>

<!-- two ============= -->
<div class="section reinsurance section-odd">
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
<div id="howto" class="section home-how">
  <div class="wrapper">
    <h2 class="section-title">Taelam, comment ça marche ?</h2>
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
                fois trouvé, Taelam prélèvera une seule et unique fois 19 euros, jamais
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
    <h2 class="section-title">Partagez vos connaissances avec Taelam</h2>
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
          Je me suis inscrit sur Taelam il y a un peu plus d’un an pour gagner quelques euros par
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
@include('includes.awesomeplete.diacritics')



<script>
  $(document).ready(function () {

    $('.carousel').slick({
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: false,
      dots: true,
      cssEase: 'linear',
    });

    var submitForm = function (event) {
      event.preventDefault();
      var subject = $("#subject_input").val();
      var loc     = $("#location_input").val();
      toastr.options.positionClass = "toast-top-full-width";

      if (subject.length < 1) {
        toastr.info("Veuillez saisir une matière");
        return;
      }

      if (loc.length < 1) {
        toastr.info("Veuillez sélectionner une ville");
        return;
      }

      url = "/annonces/" + subject + "/" + loc;
      url = url.replace(/ /g, '-');
      window.location.assign(url);
    };

    $("#search_form").submit(submitForm);

    var abba = true;
    $('#pane-b').hide();
    function toggleFade() {
      if (abba) {
        $('#pane-a').fadeOut('slow', function () {
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

    new Awesomplete(document.getElementById('subject_input'), {
      filter: function (text, input) {
        return new RegExp("^" + removeDiacritics(input.trim()), "i").test(removeDiacritics(text));
      }
    });
  });

  $("#howto-btn").click(function() {
    $('html, body').animate({
      scrollTop: $("#howto").offset().top
    }, 1500);
  });

</script>

<script>
  var gmaps = {

    init: function () {
      var autocomplete = new google.maps.places.Autocomplete(document.getElementById('location_input'), {
        types: ['(cities)'],
        componentRestrictions: {country: "ma"},
        details: ".location-details"
      });

      autocomplete.addListener('place_changed', function () {
        $("#search_form").submit();
      });

      gmaps.setup();
    },

    displaySuggestions: function (predictions, status) {
      gmaps.predictions = predictions ? predictions.length : 0;

      if (status != google.maps.places.PlacesServiceStatus.OK) {
        toastr.options.preventDuplicates = true;
        toastr.info("Aucune ville ne correspond à votre saisie");
        return;
      }
    },

    predictions: 0,

    autocomplete: new google.maps.places.AutocompleteService(),

    setup: function () {
      $("#location_input").on('keyup', function () {
        if ($(this).val()) {
          gmaps.autocomplete.getPlacePredictions({
            input: $(this).val(),
            types: ['(cities)'],
            componentRestrictions: {country: "ma"}
          }, gmaps.displaySuggestions)
        }
      });


      var submitForm = function (event) {
        event.preventDefault();
        toastr.options.positionClass = "toast-top-full-width";
        if (gmaps.predictions < 1) {
          toastr.options.preventDuplicates = true;
          toastr.info("Aucune ville ne correspond à votre saisie");
          return;
        }
      };

      $("#search_form").submit(submitForm);
    }

  };
  $(document).ready(gmaps.init);

</script>
  @endsection

