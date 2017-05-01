@extends('emails.master')
@section('content')

    <p>Bonjour {{$name }},</p>

    <br>
    <p>Merci de votre intérêt pour Taelam, le site dédié aux cours particuliers.</p>
    <br>
    <p>Votre annonce : {{$advert->title}} a été modérée par l'un de nos administrateurs.</p>
    <br>

    <p>Nous ne pouvons pas la publier pour le moment pour la raison suivante : </p>

    <p>{{$message}}</p>



    <p>Connectez-vous sur <a href="https://www.taelam.com/mon-compte">Taelam</a> pour la modifier afin qu'elle soit publiée au plus vite.</p>

    <br>

    <p>À très bientôt sur <a href="https://www.taelam.com">Taelam</a></p>
    <br>

    <p>L'Équipe Taelam</p>
@stop
