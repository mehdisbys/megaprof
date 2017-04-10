@extends('emails.master')
@section('content')

    <p>Bonjour {{$name }},</p>

    <br>
    <p>Votre demande de réservation a été acceptée par le professeur</p>
    <br>
    <p>Connectez-vous sur <a href="http://www.taelam.com/mon-compte">Taelam</a> pour obtenir les coordonnées de votre professeur.</p>

    <br>

    <p>À très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
    <br>

    <p>L'Équipe Taelam</p>
@stop
