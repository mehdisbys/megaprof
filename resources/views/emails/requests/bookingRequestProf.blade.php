@extends('emails.master')
@section('content')

    <h2>{{$name}}, vous avez reçu une demande de cours </h2>
    <br>

    <p>Bonjour {{$name}},</p>

    <br>

    <p>Un élève souhaite réserver un cours avec vous.</p>

    <p>Pour répondre à sa demande, connectez-vous dès maintenant sur <a href="http://www.taelam.com/mon-compte">votre compte Taelam</a></p>

    <br>

    <p>Attention en cas de non réponse de votre part, votre profil sera suspendu donc même si c’est un refus pensez à y répondre.</p>

    <br>

    <p>A très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
    <br>
    <p>L'Équipe Taelam</p>

@stop
