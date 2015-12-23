@extends('layouts.master')

@section('content')

    {!! HTML::script("js/parsley.min.js")!!}

    <form id="presentation-content"  accept-charset="UTF-8"
          action="http://megaprof.local/nouvelle-annonce-5" method="POST" data-parsley-validate>

        {!! csrf_field() !!}

        {!! Form::hidden('advert_id', $advert_id) !!}


        <h2 class="col-md-offset-3">Quel est le prix de vos cours ?</h2>

        {!! Form::label('price',"Quel est le prix d'une heure de cours ?", ['class' => 'col-md-offset-3 col-md-9']) !!}

        <div class="small col-md-offset-1 col-md-2"><em>Indiquez ici votre prix de base pour une heure de cours, sans réduction ni autre déduction</em></div>
        {!! Form::input('text', 'price', null,['class' => 'sm-form-control small-input col-md-6 leftmargin-sm', 'id' => 'price']) !!}
        <div class="col-md-3 small">&nbsp; Dirhams</div>

        <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>

        @if($can_travel)

        <div class="ck-button col-md-12 col-md-offset-3">
            {!! Form::input('checkbox','price_travel_supp',null,['class' => 'no-display', 'id' => 'price_travel_supp']) !!}
            <label for='price_travel_supp' class="">
                <span>Je souhaite facturer un supplément lorsque je me déplace</span>
            </label>
        </div>

        <div class="col-md-12 no-visibility-off topmargin-sm" id="map-and-radius">

            <div class="small col-md-offset-1 col-md-2"><em>Ce montant sera rajouté à votre prix de base</em></div>
            {!! Form::input('text', 'price_travel', null,['class' => 'sm-form-control small-input col-md-6 leftmargin-sm']) !!}
            <div class="col-md-3 small">&nbsp; Dirhams</div>

        </div>

        <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>
        @endif

        @if($can_webcam)

            <div class="ck-button col-md-12 col-md-offset-3">
                {!! Form::input('checkbox','price_webcam_bool',null,['class' => 'no-display', 'id' => 'price_webcam_bool']) !!}
                <label for='price_webcam_bool' class="">
                    <span>Je souhaite réduire le prix lorsque les cours se font via webcam</span>
                </label>
            </div>

            <div class="col-md-12 no-visibility-off topmargin-sm" id="map-and-radius">
                <div class="small col-md-offset-1 col-md-2"><em>Ce pourcentage sera déduit de votre prix de base</em></div>
                {!! Form::input('text', 'price_webcam', null,['class' => 'sm-form-control small-input col-md-6 leftmargin-sm']) !!}
                <div class="col-md-3 small">&nbsp; %</div>
            </div>

            <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>
        @endif

        <div class="ck-button col-md-12 col-md-offset-3">
            {!! Form::input('checkbox','price_degressive',null,['class' => 'no-display', 'id' => 'price_degressive']) !!}
            <label for='price_degressive' class="">
                <span>Je pratique une réduction sur les forfaits payés à l'avance </span>
            </label>
        </div>

        <div class="col-md-12 no-visibility-off topmargin-sm" id="price-reductions">

            <div class="small col-md-offset-1 col-md-2"><em>Ce pourcentage sera déduit de votre prix de base</em></div>

            {!! Form::label('price_5_hours',"Pour 5 heures", ['class' => 'col-md-2']) !!}
            {!! Form::input('text', 'price_5_hours', null,['class' => 'sm-form-control small-input col-md-6']) !!}
            <div class="col-md-1 small">&nbsp; %</div>

            <div class="clearfix"></div>

            {!! Form::label('price',"Pour 10 heures", ['class' => 'col-md-offset-3 col-md-2']) !!}
            {!! Form::input('text', 'price_10_hours', null,['class' => 'sm-form-control small-input col-md-6 bottommargin-sm ']) !!}
            <div class="col-md-1 small">&nbsp; %</div>

        </div>

        <div class="divider divider-short divider-center topmargin-sm"><i class="icon-crop"></i></div>

        <div class="col-md-offset-3 col-md-6">
            {!! Form::label('price_more',"Si vos tarifs varient en fonction d'autres paramètres, veuillez l'indiquer ci-dessous (facultatif)") !!}

            {!! Form::textarea('price_more',null,['class' => 'sm-form-control', 'id' => 'price_more']) !!}
        </div>

        <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
            <button type="submit" class="button button-3d button-large button-rounded button-green">
                J'ai défini le prix de mes cours
            </button>
        </div>
    {!! Form::close() !!}

@endsection