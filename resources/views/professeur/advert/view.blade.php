@extends('layouts.master')
@section('content')
<!-- 1 -->
<div class="view-profs-items-container">
  <div class="temp-row single-view">

    <div id="author" class="view-component-profile-sidebar">
      <div id="" class="single-view-profile-author-profile">

        <div class="single-view-profile-info">
          <div class="single-view-profile-image-wrapper">
            <img src="{{ $advert->getAvatar() }}" alt="avatar">
          </div>
          <h3><a href="#" class=" center">{{$advert->user->firstname }}</a></h3>
        </div>

        <div class="single-view-info-author">
          <ul class="iconlist">
            <li>
              <i class="fa fa-map-marker"></i>
              <strong>{{ $advert->location_city }}</strong>
            </li>
            @if($ratings)
            <li>
              <i class="fa fa-star"></i>
              <strong>Noté {{ $ratings->ratings_average}}/5</strong>
            </li>
            <li>
              <i class="fa fa-star"></i>
              <strong>{{ $ratings->ratings_count}} avis d'élèves</strong>
            </li>
            @endif
            <li>
              <i class="fa fa-asterisk"></i>
              <strong>Diplôme vérifié</strong>
            </li>
            <li>
              <i class="icon-check green"></i>
              <strong>Coordonnées vérifiées</strong>
            </li>
          </ul>

          <div id="info-price" >
            <div class="entry-overlay-meta">
              <h3><a href="#" class=" center"> {{$advert->price}} Dhs/h</a></h3>
              <div>
                <a href="http://www.facebook.com/sharer.php?u=http://localhost:8000/{{$advert->slug}}"
                  data-send="false"
                  data-layout="box_count"
                  data-width="60" data-show-faces="false"
                  rel="nofollow" target="_blank"
                  class="social-icon si-colored si-facebook">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>

                <a href="http://twitter.com/share"
                  data-count="vertical" rel="nofollow"
                  target="_blank" class="social-icon si-colored si-twitter">
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                </a>

                <a href="#" class="social-icon si-colored si-email3"  >
                  <i class="icon-email3"></i>
                  <i class="icon-email3"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <a class="button btn-succes temp-btn-block "
        href="/mise-en-relation/{{$advert->id}}">Réserver un cours</a>
  </div>
    <div class="profile-author-description">
      <h2>{{ $advert->title }}</h2>
      <div id="presentation"> {{ $advert->presentation  }}</div>
      <div class="divider divider-center"><i class="icon-circle"></i></div>
      <div class="">
        <h4 id="experience-title" class="center experience-title">Expérience</h4>
        <div id="experience"> {{ $advert->experience }}</div>
      </div>
      <div class="divider divider-center"><i class="icon-circle"></i></div>
      <div class="">
        <h4 id="curriculum-title" class="center curriculum-title">Curriculum Vitae</h4>
        <div id="curriculum"> {{ $advert->content }}</div>
      </div>
    </div>

  <!-- 2 -->
  <table class="view-table">
    <thead>
      <tr>
        <th></th>
        <th>Chez {{$advert->user->firstname}}</th>
        <th>À domicile</th>
        <th>Par webcam</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1 heure</td>
        <td>{{$advert->price}}Dh</td>
        <td>{{$advert->price_travel}}Dh</td>
        <td>{{$advert->price * ((100 - $advert->price_webcam_percentage)/100)}}Dh</td>
      </tr>
      <tr>
        <td>5 heures</td>
        <td>{{$advert->price_5_hours}}Dh</td>
        <td>{{$advert->price_5_hours + $advert->price_travel}}Dh</td>
        <td>{{$advert->price_5_hours * ((100 - $advert->price_webcam_percentage)/100)}}Dh</td>
      </tr>
      <tr>
        <td>10 heures</td>
        <td>{{$advert->price_10_hours}}Dh</td>
        <td>{{$advert->price_10_hours + $advert->price_travel}}Dh</td>
        <td>{{$advert->price_10_hours * ((100 - $advert->price_webcam_percentage)/100)}}Dh</td>
      </tr>
    </tbody>
  </table>


  <!-- 3 -->
  <div class="view-comments">

    @if($comments->count())
    <h3>Avis des étudiants</h3>
    @foreach($comments as $comment)
    <div class="view-comment">
      <strong>{{$comment->sourceUser->firstname}}</strong> : <div>{{$comment->comment}}</div>
    </div>
    @endforeach
    @endif
  </div>

  <!-- 4 -->
  <div class="similar-adverts">
    <h3>Les professeurs similaires</h3>

    <div class="similar-adverts-wrapper">
      @foreach($similarAdverts as $advert)
      <div class="similar-advert">
        <div class="avatar-wrapper">
          <img class="avatar" src="{{ getAvatar($advert->user_id) }}" alt=""/>
        </div>
        <div>{{ \App\Models\User::find($advert->user_id)->firstname}}</div>
        <h5><a href="/{{$advert->slug}}"> {{ $advert->title }}</a></h5>
        <div class="location">
          <i class="icon-location"></i> {{ $advert->location_city }}
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- 5 -->
  <script>
    $( document ).ready(function() {
      $("#leftside").affix({
        offset: {
          top: $("#leftside").offset().top,
          bottom: ($('#validate_buttons').outerHeight(true) + $('#footer').outerHeight(true)) + 100}});

      $("#rightside").affix({
        offset: {
          top: $("#rightside").offset().top,
          bottom: ($('#validate_buttons').outerHeight(true) + $('#footer').outerHeight(true)) + 140}});
    });
  </script>
</div>
@endsection
