@extends('emails.master')
@section('content')

<p>Bonjour {{$name }},</p>

<br>
<p>Votre demande de cours a malheuresement été refusée par le professeur.</p>
<br>
<p>Connectez-vous sur <a href="http://www.taelam.com">Taelam</a> pour voir les offres d'autres professeurs.</p>

<br>

<p>À très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
<br>

<p>L'Équipe Taelam</p>
@stop
