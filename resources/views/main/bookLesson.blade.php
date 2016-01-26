@extends('layouts.master')

@section('content')

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
                            <li><i class="icon-study green"></i> <strong>Diplôme vérifié</strong></li>
                            <li><i class="icon-check green"></i> <strong>Coordonnées vérifiées</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <h2 class="col-md-10">Réservez votre première heure de cours avec {{ $advert->user->firstname}}</h2>
            <h2 class="col-md-10">1er Cours Offert !</h2>

            <form id="book-a-lesson" accept-charset="UTF-8"
                  action="/reserver-un-cours" method="POST" data-parsley-validate>
                {!! csrf_field() !!}

                {!! Form::hidden('advert_id', $advert->id) !!}

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
        });

    </script>



@endsection