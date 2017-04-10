@extends('emails.master')
@section('content')
<p>Bonjour {{$name }},</p>

<br>

<p>Nous vous confirmons que votre demande de cours a bien été envoyée.</p>

<br>

<p>Nous vous enverrons un email lorsque le professeur aura répondu à votre demande.</p>

<br>

<p>À très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>

<br>

<p>L'Équipe Taelam</p>

@stop
