@extends('emails.master')
@section('content')

    <h1>Réinitialisation du mot de passe</h1>
    <br>

    <p>Bonjour {{$name}},</p>

    <br>

    <p>Vous avez demandé une réinitialisation de votre mot de passe,
        Pour en créer un nouveau, merci de cliquer <a href="{{$link}}">ici</a></p>

    <p>Vous pourrez à nouveau accéder à l’ensemble de nos services.</p>

    <p>Veuillez ignorer cet email si vous n'avez pas demandé de réinitialisation de votre mot de passe.</p>
    <br>

    <p>A très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>

    <br>

    <p>L'Équipe Taelam</p>

@stop
