@extends('emails.master')
@section('content')
    <p>Bonjour {{$studentName}}</p>

    <p>Vous avez récemment fait une demande de réservation au professeur {{$profName}}.</p>

    <p>Nous vous informons que cette réservation a automatiquement expirée en l'absence de réponse du professeur.</p>

    <p>Nous vous invitons à continuer votre recherche sur Taelam</p>

    <p>Merci de votre compréhension</p>

    <p>L'Equipe Taelam</p>
@stop
