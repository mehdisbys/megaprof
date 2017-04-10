@extends('emails.master')
@section('content')

    <h2>{{$name}}, Bienvenue sur TAELAM ! – Confirmation de votre inscription</h2>
    <br>

    <p>Bonjour {{$name}},</p>

    <br>

    <p>Pour commencer à bénéficier de nos services, merci de confirmer la création de votre compte en cliquant sur le bouton suivant :</p>
    <div class="" style="text-align: center">
        <a href="{{$link}}" class="btn btn-success">Se Connecter</a>
    </div>
    <br>
    <p>Nous vous remercions de votre confiance, suivez-nous sur les réseaux sociaux pour être au courant de l'actualité
 Taelam.</p>
    <br>
    <p>
        À très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
    <br>

    <p>L'Équipe Taelam</p>

@stop
