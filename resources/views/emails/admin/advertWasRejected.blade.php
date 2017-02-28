@extends('emails.master')
@section('content')

    <p>Bonjour {{$name }},</p>

    <br>
    <p>Votre annonce : {{$advert->title}} a été modérée par l'un de nos administrateurs.</p>
    <br>

    <p>Nous nous pouvons pas la publier pour le moment pour la raison suivante : </p>

    <p>{{$message}}</p>



    <p>Connectez-vous sur <a href="http://www.taelam.com/mon-compte">Taelam</a> pour la modifier afin qu'elle soit publiée au plus vite.</p>

    <br>

    <p>A très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
    <br>

    <p>L'Équipe Taelam</p>
@stop
