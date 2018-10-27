@extends('emails.master')
@section('content')
    <p>Bonjour {{$profName}}</p>

    <p>Vous avez reçu une demande de réservation de la part de Yacine à laquelle vous n'avez pas répondu à ce jour.</p>

    <p>Nous vous informons que la non-réponse entraîne la suppression de cette réservation.</p>

    <p>Nous vous rappelons qu'en cas d'indisponibilité, il est préfèrable de refuser la réservation.</p>

    <p>Merci de votre compréhension</p>

    <p>L'Equipe Taelam</p>
@stop
