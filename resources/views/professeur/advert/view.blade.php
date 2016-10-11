@extends('layouts.master')

@section('content')

<div class="row" data-spy="scroll" data-target=".scrollspy">
  <div id="author" class="col-md-3 col-md-offset-1 scrollspy">
    <div id="leftside" data-spy="affix">
      <img src="{{ $advert->getAvatar() }}" alt="avatar">
      <div id="info-author">
        <div class="entry-overlay-meta">
          <h3><a href="#" class=" center">{{$advert->user->firstname }}</a></h3>
          <div class="clearfix"></div>
          <ul class="iconlist">
            <li><i class="icon-location"></i> <strong>{{ $advert->location_city }}</strong> </li>
            <li><i class="icon-study green"></i> <strong>Diplôme vérifié</strong></li>
            <li><i class="icon-check green"></i> <strong>Coordonnées vérifiées</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-5">
    <h3>{{ $advert->title }}</h3>

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
  <div class="col-md-3 scrollspy">
    <div id="rightside" data-spy="affix" class="">
      <div id="info-price" >
        <div class="entry-overlay-meta">
          <h3><a href="#" class=" center"> {{$advert->price}} Dhs/h</a></h3>
          <h4>Premier cours offert !</h4>
          <div class="col-md-8">
            <a class="btn btn-danger btn-block btn-md" href="/mise-en-relation/{{$advert->id}}">Réserver un cours</a>
          </div>
          <div class="col-md-10 topmargin-sm">
            <a href="http://www.facebook.com/sharer.php?u=http://localhost:8000/{{$advert->slug}}" data-send="false" data-layout="box_count" data-width="60" data-show-faces="false" rel="nofollow" target="_blank" class="social-icon si-colored si-facebook">
              <i class="icon-facebook"></i>
              <i class="icon-facebook"></i>
            </a>
            <a href="http://twitter.com/share" data-count="vertical" rel="nofollow" target="_blank" class="social-icon si-colored si-twitter">
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
<div class="clearfix"></div>
<div class="col-md-5 col-md-offset-4 topmargin-sm table-responsive">
  <table class="table">
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
</div>

<div class="col-md-7 col-md-offset-4 topmargin-sm">

  <h3>Avis des étudiants</h3>

  @foreach($comments as $comment)
  <div class="col-md-12">
    <strong>{{$comment->sourceUser->firstname}}</strong> : {{$comment->comment}}
  </div>
  @endforeach
</div>

<div class="col-md-7 col-md-offset-4 topmargin-sm">

  <h3>Les professeurs similaires</h3>
  <div class="clearfix"></div>
  @foreach($similarAdverts as $advert)

  <div class="col-md-4">
    <div class="col-md-6">
      <img class="avatar" src="{{ getAvatar($advert->user_id) }}" alt=""/>
    </div>
    <strong>{{ \App\Models\User::find($advert->user_id)->firstname}}</strong> : <h5><a href="/{{$advert->slug}}"> {{ $advert->title }}</a></h5>
    <div class="clearfix"></div>
    <i class="icon-location"></i> <strong>{{ $advert->location_city }}</strong>

  </div>
  @endforeach
</div>

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
@endsection
