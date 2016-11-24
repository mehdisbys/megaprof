@extends('emails.master')
@section('content')

	<h1>{{$name}}, bienvenue sur TAELAM ! – Confirmation de votre Inscription</h1>
	<br>

	<p>Bonjour {{$name}},</p>

	<br>

	<p>Pour commencer à bénéficier de nos services, merci de confirmer la création de votre en compte en cliquant <a href="{{$link}}">ici</a>.</p>
	<p>Nous vous remercions de votre confiance,
	Et n’oubliez pas si vous souhaitez être au courant de toute l'actualité de TAELAM, n’hésitez pas à nous suivre sur les réseaux sociaux,
	A très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
	<br>

	<p>L'Équipe Taelam</p>

@stop
