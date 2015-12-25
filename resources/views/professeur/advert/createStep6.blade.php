@extends('layouts.master')

@section('content')

    {!! HTML::script("js/parsley.min.js")!!}
    <form id="presentation-content"  accept-charset="UTF-8"
          action="/nouvelle-annonce-6" method="POST" data-parsley-validate>

        {!! csrf_field() !!}

        {!! Form::hidden('advert_id', $advert_id) !!}

        <h2 class="col-md-12 center">Montrez votre plus beau sourire !</h2>

        <div class="col-md-12 center">
            <h5>Vous êtes sympathique, montrez-le ! Votre photo sera l'atout majeur de votre annonce pour donner confiance à vos élèves, elle est non seulement importante mais obligatoire pour que votre annonce soit en ligne</h5>
        </div>

        <div class="col-md-12 center topmargin-sm">

            {!! HTML::image('images/question-mark-face.jpg', null, ["style" => "width:350px; height:200px; "]) !!}

            <div class="clearfix"></div>
            <a class="button" href="#"><i class="icon-camera"></i>Téléchargez une photo</a>
            <a class="button" href="#"><i class="icon-facetime-video"></i>Utilisez votre webcam</a>

        </div>
    {!! Form::close() !!}
@endsection