@extends('emails.master')
@section('content')


    <p>Bonjour {{$name}},</p>

    <br>

    <p>Des informations contraires à nos <a href="http://www.taelam.com/conditions-generales"> conditions générales </a> ont été identifiées dans l'annonce  <a href="{{$link}}">{{$advert->title}}</a> </p>
    <br>

    <p>Par conséquent, votre annonce est désormais été suspendue.</p>

    <br>

    <p>Nous vous conseillons de vous reconnecter sur le site pour y créer à nouveau une annonce ou compte respectant les conditions génèrales.</p>

    <br>
    <p>
        A très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
    <br>

    <p>L'Équipe Taelam</p>

@stop
