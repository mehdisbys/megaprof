@extends('layouts.master')
@section('content')
{!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
{!! HTML::style("temp-css/awesomplete.css") !!}
{!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR&amp;key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
{!! HTML::script("js/locationpicker.jquery.js") !!}
{!! HTML::script("js/jquery.geocomplete.min.js") !!}
{!! HTML::script("js/jquery.form.min.js") !!}

<div class="home-search">
  <h2 id="search_result_text">
    @if(isset($selectedSubject))
    {{$adverts->total() > 0 ? $adverts->total():'Aucun '}} Résultat{{$adverts->total() > 1 ? 's' : ''}}
    pour {{$selectedSubject->name}}
    @if(isset($selectedCity))
    {{ " à " . $selectedCity}}
    @endif
    @endif
  </h2>
  <div class="home-search-form-inner autocomplete awesomplete">
    <div class="search-form-wrapper">
      <form action="/search" method="post" id="search_form2">
        {!! csrf_field() !!}
        <div class="home-search-field-wrapper">
          <input
          id="subject_input"
          class="awesomplete home-search-input autocomplete-input-subject"
          placeholder="Que souhaitez-vous apprendre ?"
          data-minchars="1"
          data-autofirst="1"
          data-list="{!! $subsubjects !!}"
          name="subject"
          type="text"
          autocomplete="off"
          aria-autocomplete="list"
          value="{{$selectedSubject->name or ''}}"/>
        </div>

        <div class="home-search-field-wrapper">
          <input
          id="location_input"
          class="home-search-input autocomplete-input-city"
          placeholder="Ville où le cours a lieu"
          name="city" type="text" value="{{$selectedCity or ''}}"/>
        </div>

        <div class="home-search-button-wrapper ">
          <button id="submit-btn" class="button home-search-submit" type="submit"> Chercher</button>
        </div>

        <div class="radius-group">
          <div id="radius_input" class="no-visibility">
            <h3> Je peux me déplacer dans un rayon de </h3>
            <div class="sorting-field">
              <label>Select radius</label>
              <input type="range"/>
            </div>
          </div>
          <div id="teacher_gender" class="topmargin-sm">
            <h3>Je préfère un professeur:</h3>
            <label class="search-radio">
              <input name="gender" value="man" type="radio"> Homme
            </label>
            <label class="search-radio">
              <input name="gender" value="woman" type="radio"> Femme
            </label>
            <label class="search-radio">
              <input name="gender" value="both" type="radio"> Les deux me vont
            </label>
          </div>

          <div class="location-details no-visibility">
            {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
            {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
          </div>

          <input type="hidden" class="autocomplete-current-page" value="{{$adverts->currentPage()}}" name="page">
        </div>
      </form>
    </div>
  </div>
</div>
<div class="section section-odd home-profs">
  <div class="wrapper">
    <div class="sorting-field">
      <label>Trier par</label>
      <select name="sortBy" class="autocomplete-input-sortby">
        <option value="distance">Distance</option>
        <option value="date">Date</option>
        <option value="price">Prix</option>
      </select>
    </div>
    <div class="home-profs-items-container">
      <ul class="home-profs-items inline-block-grid filters-results"></ul>
      <!-- optional to show advert count  -->
      @if(count($adverts) == 0)
      <div id="search_results" class="">
        <div>Malheuresement aucune annonce correspondant à vos critères n'a été trouvée. Réessayez avec
          d'autres options
        </div>
      </div>
      @else
      <div class="count_results" class="topmargin-sm bottommargin-sm">
        <span id="count_text">{{ $adverts->total() }} Annonce{{$adverts->total() > 1 ? 's' : ''}}
          trouvées</span>
      </div>
      <div id="search_results" class="">
        @include('main.multipleAdvertPreview')
      </div>
      @endif
    </div>
    <!-- optional to show advert count  -->
  </div>
</div>

<script>
  /**
   * TODO -- refactor javascript
   * there is a bit too much going on here
   *
   * */
  $(document).ready(function () {
    function updatePage(data) {
      $("#count_text").html(data.count + ' Annonces trouvées');
      $("#search_results").html(data.results);
      $("#search_subject").html(data.params.selectedSubject);
      var searchText = '';
      if (data.params.city)
        $("#search_city").html('à ' + data.params.city);
      if (data.params.selectedSubject) {
        searchText = data.count + ' Résultats pour ' + data.params.selectedSubject;
      }

      if (data.params.city) {
        searchText += ' à ' + data.params.city;
      }
      $("#search_result_text").html(searchText);
    }

    var sendFormBy = function sortBySendForm(page) {

      function sendForm(event) {
        event.preventDefault();
        var subject = $(".autocomplete-input-subject").val();
        var city = $(".autocomplete-input-city").val();
        var token = $("[name='_token']").val();
        var sortBy = $(".autocomplete-input-sortby").val();
        var gender = $("[name='gender']:checked").val();

        $.post('/search',
          {
            'subject': subject,
            'city': city,
            '_token': token,
            'sortBy': sortBy,
            'gender': gender,
            'page': page ? page.replace(/[^0-9]/g,'') : null
          },
          function (data) {
            updatePage(data);
          });
      };
      return sendForm;
    }

    $(document).on('click', '.home-search-submit', sendFormBy(null));
    $(".autocomplete-input-sortby").change(sendFormBy(null));
    $(document).on("click", '.pagination-link', function(event) {sendFormBy($(this).attr('href'))(event);});
    // Geocompletion
    $('#location_input').geocomplete({types: ['(cities)'], componentRestrictions: {country: "ma"},  details: ".location-details"});
  });
</script>
@endsection
