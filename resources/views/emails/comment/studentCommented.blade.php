@extends('emails.master')
@section('content')


<p>Bonjour {{$name }},</p>

<br>

<p>Votre étudiant a laissé un commentaire sur votre cours.</p>

<br>

<p>Connectez-vous sur <a href="http://www.taelam.com/mon-compte">votre compte Taelam</a> pour le consulter.</p>

 <br>

<p>A très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
<br>
<p>L'Équipe Taelam</p>
@stop
