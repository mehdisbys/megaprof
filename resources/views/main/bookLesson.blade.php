@extends('layouts.__master')

@section('content')
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=fr-FR&key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::script("js/jquery.geocomplete.min.js") !!}
    {!! HTML::style("css/jquery-ui.css") !!}
    {!! HTML::script("js/jquery-ui.js")!!}

    @include('includes.inputErrors')
    <div class="row" data-spy="scroll" data-target=".scrollspy">

        <div id="author" class="col-md-3 col-md-offset-1 scrollspy">
            <div id="leftside" data-spy="affix">
                <img src="{{ $advert->getAvatar() }}" alt="">

                <div id="info-author">
                    <div class="entry-overlay-meta">
                        <h3><a href="#" class=" center">{{$advert->user->firstname }}</a></h3>
                        <div class="clearfix"></div>
                        <ul class="iconlist">
                            <li><i class="icon-location"></i> <strong>{{ $advert->location_city }}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <h2 class="col-md-10">Réservez votre première heure de cours avec {{ $advert->user->firstname}}</h2>

            <form id="book-a-lesson" accept-charset="UTF-8"
                  action="/reserver-un-cours" method="POST" data-parsley-validate>
                {!! csrf_field() !!}
                {!! Form::hidden('advert_id', $advert->id) !!}
                {!! Form::hidden('prof_user_id', $advert->user->id) !!}

                <div class="clearfix"></div>
                <div class="col-md-4 bold">
                    Présentez-vous à {{$advert->user->firstname}} et dites-lui ce que vous souhaitez apprendre
                </div>

                <div class="col-md-8">
                    <em> Dites-en un peu plus à {{$advert->user->firstname}} sur votre recherche de cours. Plus vous
                        donnerez d'informations à votre professeur, plus il sera susceptible d'accepter votre
                        demande</em>
                    <ul class="form-inputs-informations topmargin-sm">
                        <li>Qu'attendez vous de ses cours ?</li>
                        <li>Quel type/niveau de cours recherchez-vous ?</li>
                        <li>A quelle fréquence souhaitez-vous prendre vos cours ?</li>
                    </ul>
                    {!! Form::textarea('presentation',null,['class' => 'sm-form-control', 'id' => 'presentation',
                             'required' => "required",
                            'data-parsley-required-message'=>"Ce champs est requis",
                            'data-parsley-minimumwords' => "40",
                            'Placeholder' => 'Présentez-vous',
                            'title' => "Entrez au moins 40 mots"]) !!}

                    <div class="divider divider-short divider-rounded divider-center"><i class="icon-pencil"></i></div>
                </div>
                <div class="col-md-4 bold">
                    Date du premier cours
                </div>
                <div class="col-md-8">
                    <div class="ck-button">
                        {!! Form::radio('date','asap', null,['class' => 'no-display', 'id' => 'date_asap']) !!}
                        <label for='date_asap'>
                            <span>Au plus tôt</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('date','this_week', null,['class' => 'no-display', 'id' => 'date_this_week']) !!}
                        <label for='date_this_week'>
                            <span>Cette semaine</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('date','custom', null,['class' => 'no-display', 'id' => 'date_custom']) !!}
                        <label for='date_custom'>
                            <span>Date au choix</span>
                        </label>
                    </div>
                    <div class="col-md-12 no-visibility" id="date_custom_display">
                        {!! Form::input('text','pick_a_date', null, ['id' => 'pick_a_date', 'placeholder' => 'Choisir une date', 'class' => 'pikaday-field']) !!}
                    </div>
                </div>

                <div class="col-md-4 bold topmargin-sm">
                    Oú se déroulera le cours ?
                </div>
                <div class="col-md-8 topmargin-sm">
                    <div class="ck-button">
                        {!! Form::radio('location','teacher', null,['class' => 'no-display', 'id' => 'location_teacher']) !!}
                        <label for='location_teacher'>
                            <span>Chez {{$advert->user->firstname}}</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('location','my_place', null,['class' => 'no-display', 'id' => 'location_my_place']) !!}
                        <label for='location_my_place'>
                            <span>Chez moi</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('location','any', null,['class' => 'no-display', 'id' => 'location_any']) !!}
                        <label for='location_any'>
                            <span>Les deux me vont</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('location','webcam', null,['class' => 'no-display', 'id' => 'location_webcam']) !!}
                        <label for='location_webcam'>
                            <span>Par Webcam</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('location','custom', null,['class' => 'no-display', 'id' => 'location_custom']) !!}
                        <label for='location_custom'>
                            <span>Proposer un lieu</span>
                        </label>
                    </div>
                    <div class="col-md-12 no-visibility" id="location_custom_display">
                        {!! Form::input('text','pick_a_location', null, ['id' => 'pick_a_location', 'placeholder' => 'Précisez le lieu']) !!}
                    </div>
                </div>
                <div class="col-md-4 bold topmargin-sm">
                    À qui s'addresse ce cours ?
                </div>
                <div class="col-md-8 topmargin-sm">
                    <div class="ck-button">
                        {!! Form::radio('client','myself', null,['class' => 'no-display', 'id' => 'client_myself']) !!}
                        <label for='client_myself'>
                            <span>Moi</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('client','notme', null,['class' => 'no-display', 'id' => 'client_notme']) !!}
                        <label for='client_notme'>
                            <span>Quelqu'un d'autre</span>
                        </label>
                    </div>
                    <div class="col-md-12 no-visibility" id="client_notme_display">
                        {!! Form::input('text','pick_a_client', null, ['id' => 'pick_a_client', 'placeholder' => "Prénom de l'élève"]) !!}
                    </div>
                    <div class="clearfix"></div>
                    <div class="ck-button">
                        {!! Form::radio('gender','man', null,['class' => 'no-display', 'id' => 'gender_man']) !!}
                        <label for='gender_man'>
                            <span>Homme</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('gender','woman', null,['class' => 'no-display', 'id' => 'gender_woman']) !!}
                        <label for='gender_woman'>
                            <span>Femme</span>
                        </label>
                    </div>
                    <div class="col-md-12" id="birthdate_display">
                        @include('includes.date-of-birth')
                    </div>
                </div>
                <div class="clearfix topmargin-sm"></div>
                <div class="divider"><i class="icon-circle"></i></div>
                <div class="col-md-4 bold">
                    Vos coordonnées
                </div>
                <div class="col-md-8">
                    {!! Form::input('text','mobile', null, ['id' => 'mobile', 'placeholder' => "mobile"]) !!}
                    <div class="clearfix"></div>
                    {!! Form::input('text','addresse', null, ['class' => 'col-md-8 topmargin-sm', 'id' => 'addresse', 'placeholder' => "Votre addresse"]) !!}
                </div>
                <div class="location-details no-visibility">

                    {!! Form::hidden('lng',null, ['id' => 'lng']) !!}
                    {!! Form::hidden('lat', null, ['id' => 'lat']) !!}
                    {!! Form::hidden('administrative_area_level_1', null, ['id' => 'administrative_area_level_1']) !!}
                    {!! Form::hidden('locality',   null, ['id' => 'locality']) !!}
                    {!! Form::hidden('country',  null, ['id' => 'country']) !!}
                </div>

                <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
                    <button type="submit" class="button button-3d button-large button-rounded button-green">
                        Envoyer ma demande
                    </button>
                </div>
            </form>
        </div>

        <div class="col-md-3 scrollspy">
            <div id="rightside" data-spy="affix" class="">

            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <script>

        $(document).ready(function () {

            $("#leftside").affix({
                offset: {
                    top: $("#leftside").offset().top,
                    bottom: ($('#validate_buttons').outerHeight(true) + $('#footer').outerHeight(true)) + 100
                }
            });

            $('#addresse').geocomplete({
            //    types: ['(street_address)'],
                componentRestrictions: {country: "ma"},
                details: ".location-details"
            });

            var toggleRadioDisplays = function (inputs) {

                inputs.forEach(toggleRadioDisplay);
            };

            var toggleRadioDisplay = function (tuple) {
                var radio = tuple[0];
                var el = tuple[1];
                console.log(radio);

                $('input[name="' + radio + '"]:radio').on('change', function () {
                    if ($(el).prop('checked'))
                        $(el + "_display").removeClass('no-visibility');
                    else
                        $(el + "_display").addClass('no-visibility');
                });
            };

            toggleRadioDisplays([["date", "#date_custom"], ["location", "#location_custom"], ["client", "#client_notme"]]);

        });
    </script>

    @include('dates.dates')

@endsection