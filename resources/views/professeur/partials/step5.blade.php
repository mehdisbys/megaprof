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

                        <h2 class="col-md-offset-3">@lang('professeur/partials/step5.titlePrice')</h2>

                        {!! Form::label('price',__('professeur/partials/step5.pricePerHour'), [
                        'class' => 'col-md-offset-3 col-md-9']) !!}

                        <div class="small col-md-offset-1 col-md-2"><em>@lang('professeur/partials/step5.fillInPrice')</em></div>
                        <div class="col-md-2"></div>
                        <?php $price = isset($advert) ? $advert->price : null ?>
                        {!! Form::input('text', 'price', $price,['class' =>
                        'sm-form-control small-input col-md-3 leftmargin-sm required',
                        'data-parsley-required-message'=>"",
                        'id' => 'price']) !!}

                        <div class="col-md-3 small">&nbsp; @lang('professeur/partials/step5.dirhams')</div>
                        <br>

                        <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>

                        @if($can_travel)
                            <?php $price_travel = isset($advert) ? $advert->price_travel : null ?>
                            <?php $price_travel_percentage = isset($advert) ? $advert->price_travel_percentage : null ?>

                            <div class="col-md-12 col-md-offset-3">
                                <label for='price_travel_supp' class="bottommargin-sm">
                                    {!! Form::input('checkbox','price_travel_supp', $price_travel,['class' => '', 'id' => 'price_travel_supp','checked' => $can_travel])!!}
@lang('professeur/partials/step5.addExtraFareForTravel')
                                </label>
                            </div>

                            <div class="col-md-12 {{$can_travel ? "" : "no-visibility" }}"
                                 id="price_travel_supp_display">

                                <div class="small col-md-offset-1 col-md-2"><em>@lang('professeur/partials/step5.thisWillBeAddedToTheBasicFare')</em></div>
                                {!! Form::input('text', 'price_travel_percentage', $price_travel_percentage,['class' => 'sm-form-control small-input col-md-1 leftmargin-sm', 'id' => 'price_travel_percentage']) !!}
                                <div class="col-md-1 small">&nbsp; @lang('professeur/partials/step5.dirhams')</div>
                                <div class="col-md-6" id="price_travel_text"> <span id="price_travel_span"></span> @lang('professeur/partials/step5.dirhams') </div>
                                {!! Form::hidden('price_travel', null, ['id' => 'price_travel']) !!}
                            </div>

                            <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>
                        @endif

                        @if($can_webcam)

                            <div class="col-md-12 col-md-offset-3">

                                <label for='price_webcam_bool' class="bottommargin-sm ">
                                    {!! Form::input('checkbox','price_webcam_bool',null,['class' => '', 'id' => 'price_webcam_bool',
                                'checked' => $can_webcam]) !!}
@lang('professeur/partials/step5.iOfferAReductionForWebcamLessons')
                                </label>
                            </div>

                            <?php $price_webcam = isset($advert) ? $advert->price_webcam_percentage : null ?>
                            <div class="col-md-12 {{$can_webcam? "" : 'no-visibility'}}" id="price_webcam_bool_display">
                                <div class="small col-md-offset-1 col-md-2"><em>@lang('professeur/partials/step5.thisPercentageWillBeDeducted')</em></div>
                                {!! Form::input('text', 'price_webcam_percentage', $price_webcam,['class' => 'sm-form-control small-input col-md-1 leftmargin-sm', 'id' => 'price_webcam_percentage']) !!}
                                <div class="col-md-1 small">&nbsp; %</div>
                                <div class="col-md-6" id="price_webcam_text"> <span id="price_webcam_span"></span> @lang('professeur/partials/step5.dirhams') @lang('professeur/partials/step5.pricePerHourViaWebcam') </div>
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
    'checked' => $price_degressive]) !!} @lang('professeur/partials/step5.iOfferADeductionForBundles')
                            </label>
                        </div>

                        <div class="col-md-12 {{ $price_degressive_bool ? '' : 'no-visibility'}}"
                             id="price_degressive_display">

                            <div class="small col-md-offset-1 col-md-2"><em>@lang('professeur/partials/step5.thisPercentageWillBeDeducted')</em></div>

                            <?php $percentage_5_hours = isset($advert) ? $advert->price_5_hours_percentage : null; ?>
                            {!! Form::label('price_5_hours_percentage',"Pour 5 heures", ['class' => 'col-md-2']) !!}
                            {!! Form::input('text', 'price_5_hours_percentage', $percentage_5_hours,['class' => 'sm-form-control small-input col-md-1', 'id' => 'price_5_hours_percentage']) !!}
                            <div class="col-md-1 small">&nbsp; %</div>
                            <div class="col-md-5" id="price_5_hours_text"> <span id="price_5_hours_total"></span> @lang('professeur/partials/step5.dirhams')</div>

                            <div class="clearfix"></div>

                            <?php $percentage_10_hours = isset($advert) ? $advert->price_10_hours_percentage : null; ?>
                            {!! Form::label('price_10_hours_percentage',"Pour 10 heures", ['class' => 'col-md-offset-3 col-md-2']) !!}
                            {!! Form::input('text', 'price_10_hours_percentage', $percentage_10_hours,['class' => 'sm-form-control small-input col-md-2 bottommargin-sm', 'id' => 'price_10_hours_percentage']) !!}
                            <div class="col-md-1 small">&nbsp; %</div>
                            <div class="col-md-5" id="price_10_hours_text"><span id="price_10_hours_total"></span> @lang('professeur/partials/step5.dirhams')
                            </div>
                            {!! Form::hidden('price_5_hours', null, ['id' => 'price_5_hours' ]) !!}
                            {!! Form::hidden('price_10_hours', null, ['id' => 'price_10_hours' ]) !!}

                        </div>

                        <div class="divider divider-short divider-center topmargin-sm"><i class="icon-crop"></i></div>

                        <div class="col-md-12" id="free_first_time">

                            <div class="small col-md-offset-1 col-md-2"><em>@lang('professeur/partials/step5.firstHourFree')</em></div>

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
                                                                  name="free_first_time">@lang('professeur/partials/step5.iOfferTheFirstHour')</label>

                        </div>

                        <div class="divider divider-short divider-center topmargin-sm"><i class="icon-crop"></i></div>

                        <div class="col-md-offset-3 col-md-6">
                            <?php $price_more = isset($advert) ? $advert->price_more : null ?>

                            {!! Form::label('price_more',__('professeur/partials/step5.pricingMoreInfo')) !!}

                            {!! Form::textarea('price_more', $price_more,['class' => 'sm-form-control', 'id' => 'price_more']) !!}
                        </div>

                        <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
                            <div class="bs-callout bs-callout-warning  col-md-6 col-md-offset-3 alert alert-danger hidden">
                                <strong>@lang('professeur/partials/step5.pleasePutPriceForOneHour')</strong>
                            </div>
                            <button type="submit" class="button button-3d button-large button-rounded" id="submitStep5">
                                @lang('professeur/partials/step5.iHaveDefinedThePrice')
                            </button>
                        </div>
        {!! Form::close() !!}

        {!! HTML::script("js/step5.js")!!}

</div>