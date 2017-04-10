@extends('emails.master')
@section('content')

    <p>Bonjour {{$name }},</p>

<br>

<p>Votre professeur a laissé un commentaire sur vous.</p>

<br>

<p>Connectez-vous sur votre <a href="http://www.taelam.com/mon-compte">votre compte Taelam</a> pour le consulter.</p>

<br>

<p>À très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>

<br>

<p>L'Équipe Taelam</p>

@stop

