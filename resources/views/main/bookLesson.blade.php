@extends('layouts.master')


@section('title')

    @if($advert->subjectsPerAd->count() == 1)
        <?php $subjects = ucfirst(\App\Models\SubSubject::find($advert->subjectsPerAd->first()->subject_id)->name) ?>
    @elseif($advert->subjectsPerAd->count() > 1)
        <?php $titleSubjects = [] ?>
        @foreach($advert->subjectsPerAd as $subject)
            <?php $titleSubjects[] = ucfirst(\App\Models\SubSubject::find($subject->subject_id)->name); ?>
        @endforeach
        <?php $subjects = implode($titleSubjects, ', ') ?>
    @endif

    <title>Prendre un cours particulier de {{$subjects}} à {{$advert->location_city}} avec {{$advert->user->firstname}}
        |
        Taelam </title>
@endsection()

@section('meta_description')
    <meta name="Description" lang="fr"
          content="Professeur particulier offre cours de {{$subjects}} à {{$advert->location_city}} : {{str_limit($advert->presentation, 150)}}"/>
@endsection

@section('content')
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=fr-FR&key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::script("js/jquery.geocomplete.min.js") !!}
    {!! HTML::style("css/jquery-ui.css") !!}
    {!! HTML::script("js/jquery-ui.js")!!}

    @include('includes.inputErrors')
    @include('includes.info')
    <div class="row">

        <div class="col-md-6 center bottommargin-sm"><a href="/{{$advert->slug}}"> << Retour à l'annonce </a></div>
        <div class="clearfix"></div>

        <div id="author" class="col-md-3 col-md-offset-1">

            <div id="leftside">
                <img src="{{ $advert->getAvatar() }}" alt="">

                <div id="info-author">
                    <div class="entry-overlay-meta">
                        <h3><a href="#" class=" center">{{$advert->user->firstname }}</a></h3>
                        <div class="clearfix"></div>
                        {{--<ul class="iconlist">--}}
                        <li><i class="icon-location"></i> <strong>{{ $advert->location_city }}</strong></li>
                        @if($advert->free_first_time != NULL)
                            <li class="topmargin-small"><strong>1ère heure de cours offerte !</strong></li>
                            @endif
                            </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php $radioClass = $testing ? '' : 'no-display' ?>

        <div class="col-md-7">
            <h2 class="col-md-10">Réservez votre première heure de cours avec {{ $advert->user->firstname}}</h2>

            @if(Auth::check() == false)
                <?php $action = "/reserver-un-cours-guest" ?>
            @else
                <?php $action = "/reserver-un-cours" ?>
            @endif

            <form id="book-a-lesson" accept-charset="UTF-8" method="POST" action="{{$action}}" data-parsley-validate>

                {!! csrf_field() !!}
                {!! Form::hidden('advert_id', $advert->id) !!}
                {!! Form::hidden('prof_user_id', $advert->user->id) !!}

                <div class="clearfix"></div>
                <div class="col-md-4 bold">
                    Présentez-vous à {{$advert->user->firstname}} et dites-lui ce que vous souhaitez
                    apprendre
                </div>

                <div class="col-md-8">
                    <em> Dites-en un peu plus à {{$advert->user->firstname}} sur votre recherche de cours.
                        Plus vous
                        donnerez d'informations à votre professeur, plus il sera susceptible d'accepter
                        votre
                        demande</em>
                    <ul class="form-inputs-informations topmargin-sm">
                        <li>Qu'attendez vous de ses cours ?</li>
                        <li>Quel type/niveau de cours recherchez-vous ?</li>
                        <li>A quelle fréquence souhaitez-vous prendre vos cours ?</li>
                    </ul>
                    {!! Form::textarea('presentation',old('presentation'),['class' => 'sm-form-control', 'id' => 'presentation',
                             'required' => "required",
                            'data-parsley-required-message'=>"Ce champs est requis",
                            'data-parsley-minimumwords' => "40",
                            'Placeholder' => 'Présentez-vous',
                            'title' => "Entrez au moins 40 mots"]) !!}

                    <div class="divider divider-short divider-rounded divider-center"><i
                                class="icon-pencil"></i></div>
                </div>
                <div class="col-md-4 bold">
                    Date du premier cours
                </div>
                <div class="col-md-8">
                    <div class="ck-button">
                        {!! Form::radio('date','asap', old('date'),['class' => $radioClass, 'id' => 'date_asap']) !!}
                        <label for='date_asap'>
                            <span>Au plus tôt</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('date','this_week', old('date'),['class' => $radioClass, 'id' => 'date_this_week']) !!}
                        <label for='date_this_week'>
                            <span>Cette semaine</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('date','custom', old('date'),['class' => $radioClass, 'id' => 'date_custom']) !!}
                        <label for='date_custom'>
                            <span>Date au choix</span>
                        </label>
                    </div>
                    <div class="col-md-12 no-visibility" id="date_custom_display">
                        {!! Form::input('text','pick_a_date', old('pick_a_date'), ['id' => 'pick_a_date', 'placeholder' => 'Choisir une date', 'class' => 'pikaday-field']) !!}
                    </div>
                </div>

                <div class="col-md-4 bold topmargin-sm">
                    Oú se déroulera le cours ?
                </div>
                <div class="col-md-8 topmargin-sm">
                    <div class="ck-button">
                        {!! Form::radio('location','teacher', null,['class' => $radioClass, 'id' => 'location_teacher']) !!}
                        <label for='location_teacher'>
                            <span>Chez {{$advert->user->firstname}}</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('location','my_place', null,['class' => $radioClass, 'id' => 'location_my_place']) !!}
                        <label for='location_my_place'>
                            <span>Chez moi</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('location','any', null,['class' => $radioClass, 'id' => 'location_any']) !!}
                        <label for='location_any'>
                            <span>Les deux me vont</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('location','webcam', null,['class' => $radioClass, 'id' => 'location_webcam']) !!}
                        <label for='location_webcam'>
                            <span>Par Webcam</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('location','custom', null,['class' => $radioClass, 'id' => 'location_custom']) !!}
                        <label for='location_custom'>
                            <span>Proposer un lieu</span>
                        </label>
                    </div>
                    <div class="col-md-12 no-visibility" id="location_custom_display">
                        {!! Form::input('text','pick_a_location', null, ['id' => 'pick_a_location', 'placeholder' => 'Précisez le lieu']) !!}
                    </div>
                </div>
                <div class="col-md-4 bold topmargin-sm">
                    À qui s'adresse ce cours ?
                </div>
                <div class="col-md-8 topmargin-sm">
                    <div class="ck-button">
                        {!! Form::radio('client','myself', null,['class' => $radioClass, 'id' => 'client_myself']) !!}
                        <label for='client_myself'>
                            <span>Moi</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('client','notme', null,['class' => $radioClass, 'id' => 'client_notme']) !!}
                        <label for='client_notme'>
                            <span>Quelqu'un d'autre</span>
                        </label>
                    </div>
                    <div class="col-md-12 no-visibility" id="client_notme_display">
                        {!! Form::input('text','pick_a_client', null, ['id' => 'pick_a_client', 'placeholder' => "Prénom de l'élève"]) !!}
                    </div>
                    <div class="clearfix"></div>
                    <div class="ck-button">
                        {!! Form::radio('gender','man', null,['class' => $radioClass, 'id' => 'gender_man']) !!}
                        <label for='gender_man'>
                            <span>Homme</span>
                        </label>
                    </div>
                    <div class="ck-button">
                        {!! Form::radio('gender','woman', null,['class' => $radioClass, 'id' => 'gender_woman']) !!}
                        <label for='gender_woman'>
                            <span>Femme</span>
                        </label>
                    </div>
                    @if(Auth::check() == false)

                        <div class="col-md-12" id="birthdate_display">
                            @include('includes.date-of-birth')
                        </div>
                    @endif

                </div>
                <div class="clearfix topmargin-sm"></div>
                @if(Auth::check() == false)
                    <div class="col-md-4 bold topmargin-sm">
                        Vos coordonnées
                    </div>

                    <div class="col-md-8">

                        <input class="topmargin-sm" id="mobile" placeholder="T&eacute;l&eacute;phone" name="mobile" type="text">
                        <input class="topmargin-sm" id="addresse" placeholder="Votre ville ou quartier" name="addresse" type="text">
                        <input class="topmargin-sm" id="firstname" placeholder="Pr&eacute;nom" name="firstname" type="text">
                        <input class="topmargin-sm" id="email" placeholder="Email" name="email" type="email">
                        <input class="topmargin-sm" size="28" id="password"
                               placeholder="Choisissez un mot de passe" name="password" type="password">
                       <span> <i data-tooltip="Un mot de passe est nécessaire pour suivre votre réservation."><i class="icon-question-sign" ></i></i></span>

                        <div class="input-text input-container topmargin-lg">
                            <label style="text-transform: none">
                                <input class="topmargin-sm" type="checkbox" required="required" name="cgu"/>
                                J'ai lu et j'accepte les <a href="/cgu">CGU</a>
                            </label>
                        </div>

                        <div class="g-recaptcha topmargin-sm"
                             data-sitekey="6LfJ2xsUAAAAACPgk0dN3HNLY1p_3vS0_s1964mU"
                             data-callback="submitForm"></div>

                        <p class="register-member">Déjà membre Taelam ?
                            <a href="login" class="register-member-link register-switch-panel">Connexion</a>
                        </p>
                    </div>

                @endif
                <div class="location-details no-visibility">
                    {!! Form::hidden('lng',null, ['id' => 'lng']) !!}
                    {!! Form::hidden('lat', null, ['id' => 'lat']) !!}
                    {!! Form::hidden('administrative_area_level_1', null, ['id' => 'administrative_area_level_1']) !!}
                    {!! Form::hidden('locality',   null, ['id' => 'locality']) !!}
                    {!! Form::hidden('country',  null, ['id' => 'country']) !!}
                </div>

                <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
                    <button type="submit" class="button button-3d button-large button-rounded"
                            id="submitForm">
                        Envoyer ma demande
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>

        $(document).ready(function () {

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