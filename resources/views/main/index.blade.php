@extends('layouts.master')
@section('content')
{!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
{!! HTML::style("temp-css/awesomplete.css") !!}
{!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR') !!}
{!! HTML::script("js/locationpicker.jquery.js") !!}
{!! HTML::script("js/jquery.geocomplete.min.js") !!}
{!! HTML::script("js/jquery.form.min.js") !!}
<div class="home-search">
  <h2> Search results for {!! 'Mathématiques' !!} within {!! 'paris' !!}</h2>
  <div class="home-search-form-inner autocomplete awesomplete">
    <div class="">
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
          aria-autocomplete="list"/>
        </div>
        <div class="home-search-field-wrapper">
          <input id="location_input"
          class="home-search-input autocomplete-input-city"
          placeholder="Ville où le cours a lieu"
          name="city" type="text" />
        </div>
        <div class="home-search-button-wrapper home-search-submit">
          <button id="submit-btn" class="button" type="submit"> submit</button>
        </div>
      </div>
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
        </div>
   </form>
</div>

<div class="section section-odd home-profs">
  <div class="wrapper">
    <div class="sorting-field">
      <label>Sort by</label>
      <select name="sorting">
        <option value="date">Date</option>
        <option value="price">Price</option>
        <option value="distance">Distance</option>
      </select>
    </div>
    <div class="home-profs-items-container">
      <ul class="home-profs-items inline-block-grid filters-results"></ul>
      <!-- optional to show advert count  -->
      @if(count($adverts) == 0)
      <div>Malheuresement aucune annonce correspondant à vos critères n'a été trouvée. Réessayez avec d'autres options</div>
      @else
      <div class="count_results" class="topmargin-sm bottommargin-sm">
        <span id="count_text">{{ count($adverts) }} Items found</span>
      </div>
      <div id="search_results">
        @include('main.multipleAdvertPreview')
      </div>
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
<script>
  /**
   * TODO -- refactor javascript
   * there is a bit too much going on here
   *
   * */
$(document).ready(function () {
  function updatePage(data) {
    $("#count_text").html(data.count);
    $("#search_results").html(data.results);
    updateForm(data);
  }

  function updateForm(data) {
    if(data.params.selectedSubject) {
      $("#subject").html(data.params.selectedSubject);
      makeVisible(['subject','city_input']);
      makeInvisible(['subject_input']);
    }

    if(data.params.city) {
      $("#city").html(data.params.city);
      makeVisible(['city','radius_input']);
      makeInvisible(['city_input']);
    }

    if(data.params.selectedRadius) {
      $("#radius").html(data.params.selectedRadius);
      makeVisible(['radius']);
      makeInvisible(['radius_input']);
    }
  }

  // helpers
  function makeVisible(selectors) {
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

  $(".home-search-submit").click(function (event) {
    event.preventDefault();
    var subject = $(".autocomplete-input-subject").val();
    var city = $(".autocomplete-input-city").val();
    var token =  $("[name='_token']").val();
    if (subject.length < 2 ) return;
    $.post('/search', {'subject': subject, 'city': city, '_token': token}, function (data) {
      updatePage(data);
    });
  });

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

  // Geocompletion
  $('#city_input').geocomplete({types: ['(cities)'], details: ".location-details", });
});
</script>
@endsection
