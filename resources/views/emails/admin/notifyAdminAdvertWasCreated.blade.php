@extends('emails.master')
@section('content')

    <h2>Une nouvelle annonce vient d'être créée ou modifiée</h2>
    <br>

    <p>Titre: {{$advert->title}}</p>
    <p>Lieu: {{$advert->location}}</p>
    <p>description: {{$advert->presentation}}</p>

    <a href="{{$link}}">Aller sur la page de modération d'annonces.</a>

    <p>A+</p>

@stop
