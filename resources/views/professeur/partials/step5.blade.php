{!! HTML::script("js/parsley.min.js")!!}

@include('professeur.process-steps.process-steps', ['step1' => 'complete', 'step2' => 'complete', 'step3' => 'complete', 'step4' => 'complete', 'step5' => 'active'])

<div class="container">

    @include('includes.inputErrors')

    @if(\Illuminate\Support\Facades\Request::is('*modifier-annonce*'))
        <form id="presentation-content" accept-charset="UTF-8"
              action="/modifier-annonce-5/{{$advert->id}}" method="POST" data-parsley-validate>
            @else
                <form id="presentation-content" accept-charset="UTF-8"
                      action="/nouvelle-annonce-5" method="POST" data-parsley-validate>
                    @endif

                    <form id="presentation-content" accept-charset="UTF-8"
                          action="/nouvelle-annonce-5" method="POST" data-parsley-validate>

                        {!! csrf_field() !!}

                        {!! Form::hidden('advert_id', $advert_id) !!}

                        <h2 class="col-md-offset-3">Quel est le prix de vos cours ?</h2>

                        {!! Form::label('price',"Quel est le prix d'une heure de cours ?", [
                        'class' => 'col-md-offset-3 col-md-9']) !!}

                        <div class="small col-md-offset-1 col-md-2"><em>Renseignez ici votre prix pour une heure de
                                cours</em></div>
                        <div class="col-md-2"></div>
                        <?php $price = isset($advert) ? $advert->price : null ?>
                        {!! Form::input('text', 'price', $price,['class' =>
                        'sm-form-control small-input col-md-3 leftmargin-sm required',
                        'data-parsley-required-message'=>"",
                        'id' => 'price']) !!}

                        <div class="col-md-3 small">&nbsp; Dirhams</div>
                        <br>

                        <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>

                        @if($can_travel)
                            <?php $price_travel = isset($advert) ? $advert->price_travel : null ?>
                            <?php $price_travel_percentage = isset($advert) ? $advert->price_travel_percentage : null ?>

                            <div class="col-md-12 col-md-offset-3">
                                <label for='price_travel_supp' class="bottommargin-sm">
                                    {!! Form::input('checkbox','price_travel_supp', $price_travel,['class' => '', 'id' => 'price_travel_supp','checked' => $can_travel])!!}
                                    Je souhaite facturer un supplément lorsque je me déplace
                                </label>
                            </div>

                            <div class="col-md-12 {{$can_travel ? "" : "no-visibility" }}"
                                 id="price_travel_supp_display">

                                <div class="small col-md-offset-1 col-md-2"><em>Ce montant sera rajouté à votre prix de
                                        base</em></div>
                                {!! Form::input('text', 'price_travel_percentage', $price_travel_percentage,['class' => 'sm-form-control small-input col-md-1 leftmargin-sm', 'id' => 'price_travel_percentage']) !!}
                                <div class="col-md-1 small">&nbsp; Dirhams</div>
                                <div class="col-md-6" id="price_travel_text">Le tarif lorsque vous vous déplacez sera de
                                    <span id="price_travel_span"></span> Dhs par heure
                                </div>
                                {!! Form::hidden('price_travel', null, ['id' => 'price_travel']) !!}
                            </div>

                            <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>
                        @endif

                        @if($can_webcam)

                            <div class="col-md-12 col-md-offset-3">

                                <label for='price_webcam_bool' class="bottommargin-sm ">
                                    {!! Form::input('checkbox','price_webcam_bool',null,['class' => '', 'id' => 'price_webcam_bool',
                                'checked' => $can_webcam]) !!}
                                    Je souhaite réduire le prix pour les cours faits via webcam
                                </label>
                            </div>

                            <?php $price_webcam = isset($advert) ? $advert->price_webcam_percentage : null ?>
                            <div class="col-md-12 {{$can_webcam? "" : 'no-visibility'}}" id="price_webcam_bool_display">
                                <div class="small col-md-offset-1 col-md-2"><em>Ce pourcentage sera déduit de votre prix
                                        de base</em></div>
                                {!! Form::input('text', 'price_webcam_percentage', $price_webcam,['class' => 'sm-form-control small-input col-md-1 leftmargin-sm', 'id' => 'price_webcam_percentage']) !!}
                                <div class="col-md-1 small">&nbsp; %</div>
                                <div class="col-md-6" id="price_webcam_text">Le tarif lorsque vous enseignez via webcam
                                    sera de <span id="price_webcam_span"></span> Dhs par heure
                                </div>
                                {!! Form::hidden('price_webcam', null, ['id' => 'price_webcam' ]) !!}

                            </div>

                            <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>
                        @endif

                        <div class="col-md-12 col-md-offset-3">
                            <?php $price_degressive_bool = isset($advert) ? $advert->price_5_hours or $advert->price_10_hours : null;
                            $price_degressive = $price_degressive_bool ? "on" : null;
                            ?>
                            <label for='price_degressive' class="bottommargin-sm">
                                {!! Form::input('checkbox','price_degressive',null,['class' => '', 'id' => 'price_degressive',
    'checked' => $price_degressive]) !!} Je pratique une réduction sur les forfaits payés à l'avance
                            </label>
                        </div>

                        <div class="col-md-12 {{ $price_degressive_bool ? '' : 'no-visibility'}}"
                             id="price_degressive_display">

                            <div class="small col-md-offset-1 col-md-2"><em>Ce pourcentage sera déduit de votre prix de
                                    base</em></div>

                            <?php $percentage_5_hours = isset($advert) ? $advert->price_5_hours_percentage : null; ?>
                            {!! Form::label('price_5_hours_percentage',"Pour 5 heures", ['class' => 'col-md-2']) !!}
                            {!! Form::input('text', 'price_5_hours_percentage', $percentage_5_hours,['class' => 'sm-form-control small-input col-md-1', 'id' => 'price_5_hours_percentage']) !!}
                            <div class="col-md-1 small">&nbsp; %</div>
                            <div class="col-md-5" id="price_5_hours_text">Soit <span id="price_5_hours_span"></span>
                                Dhs par heure, et <span id="price_5_hours_total"></span> Dhs au total
                            </div>

                            <div class="clearfix"></div>

                            <?php $percentage_10_hours = isset($advert) ? $advert->price_10_hours_percentage : null; ?>
                            {!! Form::label('price_10_hours_percentage',"Pour 10 heures", ['class' => 'col-md-offset-3 col-md-2']) !!}
                            {!! Form::input('text', 'price_10_hours_percentage', $percentage_10_hours,['class' => 'sm-form-control small-input col-md-2 bottommargin-sm', 'id' => 'price_10_hours_percentage']) !!}
                            <div class="col-md-1 small">&nbsp; %</div>
                            <div class="col-md-5" id="price_10_hours_text">Soit <span id="price_10_hours_span"></span>
                                Dhs par heure, et <span id="price_10_hours_total"></span> Dhs au total
                            </div>
                            {!! Form::hidden('price_5_hours', null, ['id' => 'price_5_hours' ]) !!}
                            {!! Form::hidden('price_10_hours', null, ['id' => 'price_10_hours' ]) !!}

                        </div>

                        <div class="divider divider-short divider-center topmargin-sm"><i class="icon-crop"></i></div>

                        <div class="col-md-12" id="free_first_time">

                            <div class="small col-md-offset-1 col-md-2"><em>Offrir la première heure de cours permet
                                    d'inciter de nouveaux élèves à vous contacter ! Ce premier contact augmente vos
                                    chances d'en faire des étudiants réguliers.</em></div>

                            <label for="free_first_time"><input type="checkbox"
                                                                 <?php
                                                                 if(isset($advert) and $advert->published_at != NULL)
                                                                     {
                                                                         if($advert->free_first_time == true) {
                                                                                 echo 'checked="checked"';
                                                                             }
                                                                     }
                                                                     else {
                                                                         echo 'checked="checked"';
                                                                     }
                                                                         ?>
                                                                  name="free_first_time"> J'offre la
                                première heure de cours</label>

                        </div>

                        <div class="divider divider-short divider-center topmargin-sm"><i class="icon-crop"></i></div>

                        <div class="col-md-offset-3 col-md-6">
                            <?php $price_more = isset($advert) ? $advert->price_more : null ?>

                            {!! Form::label('price_more',"Si vos tarifs varient en fonction d'autres paramètres, veuillez l'indiquer ci-dessous (facultatif)") !!}

                            {!! Form::textarea('price_more', $price_more,['class' => 'sm-form-control', 'id' => 'price_more']) !!}
                        </div>

                        <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
                            <div class="bs-callout bs-callout-warning  col-md-6 col-md-offset-3 alert alert-danger hidden">
                                <strong>N'oubliez pas d'indiquer le prix pour une heure de cours</strong>
                            </div>
                            <button type="submit" class="button button-3d button-large button-rounded">
                                J'ai défini le prix de mes cours
                            </button>
                        </div>
        {!! Form::close() !!}

        {!! HTML::script("js/step5.js")!!}

</div>