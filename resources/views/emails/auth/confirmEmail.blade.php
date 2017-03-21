@extends('emails.master')
@section('content')

    <h2>{{$name}}, bienvenue sur TAELAM ! – Confirmation de votre inscription</h2>
    <br>

    <p>Bonjour {{$name}},</p>

    <br>

    <p>Pour commencer à bénéficier de nos services, merci de confirmer la création de votre compte en vous cliquant sur le bouton suivant :</p>
    <div class="" style="text-align: center">
        <a href="{{$link}}" class="btn btn-success btn-lg ">Se Connecter</a>
    </div>
    <br>
    <p>Nous vous remercions de votre confiance,suivez-nous sur les réseaux sociaux pour être au courant de l'actualité
        Taelam.</p>
    <br>
    <p>
        A très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
    <br>

    <p>L'Équipe Taelam</p>

@stop
