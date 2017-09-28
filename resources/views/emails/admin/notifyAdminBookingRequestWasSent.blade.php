@extends('emails.master')
@section('content')

    <h2>Une nouvelle réservation vient d'être envoyée</h2>
    <br>

    <p>Titre: {{$advert->title}}</p>
    <p>Lieu: {{$advert->location}}</p>

    <p>A+</p>

@stop
