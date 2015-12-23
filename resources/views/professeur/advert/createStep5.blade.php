@extends('layouts.master')

@section('content')

    {!! HTML::script("js/parsley.min.js")!!}

    <form id="presentation-content"  accept-charset="UTF-8"
          action="http://megaprof.local/nouvelle-annonce-4" method="POST" data-parsley-validate>

        {!! csrf_field() !!}

        {!! Form::hidden('advert_id', $advert_id) !!}


        <h2 class="col-md-offset-3">Quel est le prix de vos cours ?</h2>

        {!! Form::label('price',"Quel est le prix d'une heure de cours ?", ['class' => 'col-md-offset-3 col-md-9']) !!}

        <div class="small col-md-offset-1 col-md-2"><em>Indiquez ici votre prix de base pour une heure de cours, sans réduction ni avantage fiscal.</em></div>
        {!! Form::input('text', 'price', null,['class' => 'sm-form-control small-input col-md-6 leftmargin-sm', 'id' => 'price']) !!}
        <div class="col-md-3 small">&nbsp; Dirhams</div>

        <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>

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

        <div class="ck-button col-md-12 col-md-offset-3">
            {!! Form::input('checkbox','price_degressive',null,['class' => 'no-display', 'id' => 'price_degressive']) !!}
            <label for='price_degressive' class="">
                <span>Je pratique une réduction sur les forfaits payés à l'avance </span>
            </label>
        </div>



        <div class="col-md-12 no-visibility-off topmargin-sm" id="price-reductions">

            {!! Form::label('price_5_hours',"Pour 5 heures", ['class' => 'col-md-offset-3 col-md-2']) !!}
            {!! Form::input('text', 'price_5_hours', null,['class' => 'sm-form-control small-input col-md-6']) !!}

            <div class="clearfix"></div>

            {!! Form::label('price',"Pour 10 heures ?", ['class' => 'col-md-offset-3 col-md-2']) !!}
            {!! Form::input('text', 'price_10_hours', null,['class' => 'sm-form-control small-input col-md-6 bottommargin-sm ']) !!}

        </div>

        <div class="divider divider-short divider-center topmargin-sm"><i class="icon-crop"></i></div>

        <div class="col-md-offset-3 col-md-6">
            {!! Form::label('price_more',"Si vos tarifs varient en fonction d'autres paramètres, veuillez l'indiquer ci-dessous (facultatif)") !!}

            {!! Form::textarea('price_more',null,['class' => 'sm-form-control', 'id' => 'price_more']) !!}
        </div>
    {!! Form::close() !!}

@endsection