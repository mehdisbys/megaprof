{!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=fr-FR&key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
{!! HTML::script("js/jquery.geocomplete.min.js") !!}
{!! HTML::script("js/jquery-ui.js")!!}
{!! HTML::style("css/fa/css/font-awesome.css") !!}
{!! HTML::script("js/parsley.min.js")!!}


    @include('professeur.process-steps.process-steps', ['step1' => 'complete', 'step2' => 'complete', 'step3' => 'active'])

<div class="container">

    @include('includes.inputErrors')

    @if(\Illuminate\Support\Facades\Request::is('*modifier-annonce*'))
        <form method="POST" action="/modifier-annonce-3/{{$advert_id}}" accept-charset="UTF-8" data-parsley-validate
              id="location_form">
            @else
                <form method="POST" action="/nouvelle-annonce-3" accept-charset="UTF-8"
                      data-parsley-validate id="location_form">
                    @endif

                    {!! csrf_field() !!}

                    <div class="col-md-6 col-md-offset-3">

                        <h2>Lieux des cours et Modalités</h2>

                        <label for='location' class="topmargin-sm">Où se dérouleront vos cours ?</label>
                        {!! Form::hidden('advert_id', $advert_id) !!}

                        <?php $location = (isset($advert) and $advert->location_street != NULL) ? $advert->location_street . ', ' . $advert->location_city : null; ?>

                        {!! Form::input('text','location',$location,['class' => 'alert_location sm-form-control required',
                        'data-parsley-required-message' => "N'oubliez pas de sélectionner le lieu où se dérouleront vos cours",
                        'id' => 'location']) !!}
                        <div class="col-md-12"><em>Votre addresse ne sera pas divulguée à vos élèves nous l'utilisons seulement pour calculer les distances</em></div>

                        <div class="location-details no-visibility">

                            {!! Form::hidden('lng',null, ['id' => 'lng']) !!}
                            {!! Form::hidden('lat', null, ['id' => 'lat']) !!}
                            {!! Form::hidden('formatted_address',  null, ['id' => 'formatted_address']) !!}
                            {!! Form::hidden('administrative_area_level_1', null, ['id' => 'administrative_area_level_1']) !!}
                            {!! Form::hidden('locality',   null, ['id' => 'locality']) !!}
                            {!! Form::hidden('postal_code', null, ['id' => 'postal_code']) !!}
                            {!! Form::hidden('country',  null, ['id' => 'country']) !!}
                        </div>

                        <div class=" col-md-6">
                            <?php $can_webcam = isset($advert) ? $advert->can_webcam : null; ?>

                                <label for='can_webcam' class="topmargin-sm">
                                    {!! Form::input('checkbox','can_webcam',null,['class' => '', 'id' => 'can_webcam','checked' => $can_webcam ]) !!}
                                    Je peux donner des cours par webcam
                                </label>

                        </div>

                        <div class=" col-md-6">
                            <?php $can_receive = isset($advert) ? $advert->can_receive : null; ?>


                            <label for='can_receive' class="topmargin-sm">
                                {!! Form::input('checkbox','can_receive', null,['class' => '', 'id' => 'can_receive',
                            'checked' => $can_receive]) !!} Je peux recevoir mes élèves
                            </label>
                        </div>

                        <div class=" col-md-6 col-md-offset-3">
                            <?php $can_travel = isset($advert) ? $advert->can_travel : null; ?>
                                <label for='can_travel' class="topmargin-sm">
                            {!! Form::input('checkbox','can_travel',null,['class' => '', 'id' => 'can_travel',
                            'checked' => $can_travel]) !!} Je peux me déplacer
                            </label>
                        </div>

                        <?php $travel_radius = isset($advert) ? $advert->travel_radius : null; ?>

                        <div class="col-md-12 topmargin-sm no-visibility" id="map-and-radius">
                            <div class="col-md-4 form-group">
                                Dans un rayon de:
                                <select id="radius" name="radius" class="form-control">
                                    <option value="1000" selected>1 Km</option>
                                    <option value="3000">3 Km</option>
                                    <option value="5000">5 Km</option>
                                    <option value="8000">8 Km</option>
                                    <option value="13000">13 Km</option>
                                    <option value="20000">20 Km</option>
                                </select>
                            </div>

                            <div class="col-md-8">
                                <div class="col-md-12">&nbsp;</div>
                                <div id="map" style="width: 100%; height: 300px;"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
                        <button type="submit" class="button button-3d button-large button-rounded">
                            J'ai défini où se dérouleront mes cours
                        </button>
                    </div>

        {!! Form::close() !!}

        {!! HTML::script("js/step3.js")!!}

</div>