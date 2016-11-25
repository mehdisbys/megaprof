@extends('emails.master')
@section('content')

	<h2>{{$name}}, bienvenue sur TAELAM ! – Confirmation de votre inscription</h2>
	<br>

	<p>Bonjour {{$name}},</p>

	<br>

	<p>Pour commencer à bénéficier de nos services, merci de confirmer la création de votre en compte en cliquant <a href="{{$link}}">ici</a>.</p>
	<p>Nous vous remercions de votre confiance,suivez-nous sur les réseaux sociaux pour être au courant de l'actualité Taelam.</p>
	<br>
	<p>
	A très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
	<br>

	<p>L'Équipe Taelam</p>

@stop
