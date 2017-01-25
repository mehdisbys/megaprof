@extends('layouts.__master')

@section('content')
    {!! HTML::script("js/webcam.min.js") !!}
    {!! HTML::script("js/cropper.js") !!}
    {!! HTML::style('css/fa/css/font-awesome.min.css')!!}
    {!! HTML::style('css/cropper.min.css')!!}
    <div class="col-md-12">

        <div class="col-md-12 clearfix">
            <div class="col-md-3">
                <img src="/avatar_dashboard/{{Auth::id()}}">
            </div>
        </div>

        <div class="col-md-12 tabs side-tabs">

            <div class="tabs side-tabs col-md-3" id="tab-10">
                <ul class="tab-nav tab-nav2" role="tablist">

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="0" aria-controls="tabs-37"
                        aria-labelledby="ui-id-25" aria-selected="true">
                        <a href="#tabs-37" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-25">Notifications</a>
                    </li>

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-38"
                        aria-labelledby="ui-id-26" aria-selected="false">
                        <a href="#tabs-38" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-26">Mes
                            demandes de cours
                            @if(isset($bookings) and $bookings->count())
                                ({{$bookings->count()}})
                            @endif
                        </a>
                    </li>

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-48"
                        aria-labelledby="ui-id-46" aria-selected="false">
                        <a href="#tabs-48" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-26">Mes
                            commentaires
                            @if(isset($pendingComments) and $pendingComments->count())
                                ({{$pendingComments->count()}})
                            @endif
                        </a>
                    </li>

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-39"
                        aria-labelledby="ui-id-27" aria-selected="false">
                        <a href="#tabs-39" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-27">Mes
                            annonces
                            @if (isset($adverts) and $adverts->count())
                                ({{$adverts->count()}})
                            @endif
                        </a>
                    </li>

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-40"
                        aria-labelledby="ui-id-28" aria-selected="false">
                        <a href="#tabs-40" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-28">Gérer
                            mon
                            profil</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                @section('dashboard-content')

                    <div class="tab-container">

                        <div class="tab-content" id="tabs-37"
                             aria-labelledby="ui-id-25" role="tabpanel" aria-expanded="true" aria-hidden="false"
                             style="display: block;">
                            <h4>Notifications</h4>

                            @if(isset($notifications) and $notifications->count())
                                @include('notifications.list', ['notifications' => $notifications])
                            @else
                                Vous avez lu toutes vos notifications.
                            @endif
                        </div>
                        <div class="tab-content" id="tabs-38"
                             aria-labelledby="ui-id-26" role="tabpanel" aria-expanded="false" aria-hidden="true"
                             style="display: none;">

                            <div class="clearfix"></div>
                            <h4>Mes demandes de cours</h4>
                            <div class="col-md-12">
                                @include('bookings.list')
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="tabs-48" aria-labelledby="ui-id-46" role="tabpanel"
                         aria-expanded="false" aria-hidden="true"
                         style="display: none;">
                        @if(isset($pendingComments) and $pendingComments->count() > 0 )
                            <h4>Commentez vos derniers cours</h4>

                            <div class="col-md-8 bottommargin-sm">
                                @include('comments.pendingComments')
                            </div>
                        @endif
                    </div>

                    <div class="tab-container">

                        <div class="tab-content " id="tabs-39"
                             aria-labelledby="ui-id-27" role="tabpanel" aria-expanded="false" aria-hidden="true"
                             style="display: none;">
                            <h4>Mes annonces</h4>
                            @if(isset($adverts))
                                @foreach($adverts as $advert)

                                    <div class="col-md-6 clearfix bottommargin-sm border1px" data-readmore
                                         aria-expanded="false">
                                        <div class="col-md-6 clearfix">
                                            <div class="bold">{{ $advert->title}}</div>

                                            <div class="col-md-12 topmargin-sm">
                                                @foreach($advert->subjectsPerAd as $subject)
                                                    <div class="btn btn-default btn-xs">{{\App\Models\SubSubject::find($subject->subject_id)->name}}</div>
                                                    <div class="clearfix"></div>
                                                @endforeach
                                            </div>

                                            <div class="pull-right topmargin-sm">
                                                <i class="icon-location"></i><strong>{{ $advert->location_city }}</strong>
                                            </div>

                                            <div class="col-md-12">{{$advert->updated_at->format('d/m/Y H:i') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">

                                        @if($advert->published_at != null)
                                            <div class="button button-small button-red button-rounded">
                                                <a href="/desactiver-annonce/{{$advert->id}}/">Désactiver</a>
                                            </div>
                                        @else
                                            <div class="button button-small button-lime button-rounded">
                                                <a href="/activer-annonce/{{$advert->id}}/">Activer</a>
                                            </div>
                                        @endif

                                        <div class="button button-small button-leaf button-rounded">
                                            <a href="/{{$advert->slug}}">Voir</a>
                                        </div>
                                        <div class="button button-yellow button-rounded">
                                            <a href="/modifier-annonce-1/{{$advert->id}}">Modifier</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-container col-md-12">
                        @if(isset($user))
                            <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom"
                                 id="tabs-40"
                                 aria-labelledby="ui-id-28" role="tabpanel" aria-expanded="false" aria-hidden="true"
                                 style="display: none;">
                                <h4>Changer ma photo</h4>
                                <div class="col-md-12">
                                    <form id="presentation-content" accept-charset="UTF-8"
                                          action="/avatar" method="POST" enctype="multipart/form-data"
                                          data-parsley-validate>

                                        {!! csrf_field() !!}

                                        <div class="col-md-12 center topmargin-sm">

                                            <div id="img-container">

                                                <div id="webcam" class="no-visibility col-md-3 col-md-offset-3">
                                                    <div id="my_camera"></div>
                                                    <a href="javascript:void(take_snapshot())"
                                                       class="button button-3d button-mini button-rounded button-blue">Prendre
                                                        la photo</a>
                                                    <input type="hidden" name="webcam_img" id="webcam_img">
                                                </div>

                                                <div id="capture" class="col-md-12 no-visibility">
                                                    <div id="my_result" style="" class=""></div>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>

                                            <input type="file" id="img_upload" name="img_upload" class="no-visibility"
                                                   accept="image/*">
                                            <input type="file" class="sr-only" id="inputImage" name="file"
                                                   accept="image/*">

                                            <div class="row-spy" data-spy="scroll" data-target=".scrollspy">

                                                <div class="col-md-12">
                                                    <div class="img-container no-visibility col-md-9">
                                                        <img id="image" src="" alt="Votre Image" name="image"
                                                             class="no-visibility">
                                                        <input name="x" id="x" type="text" class="no-visibility">
                                                        <input name="y" id="y" type="text" class="no-visibility">
                                                        <input name="w" id="w" type="text" class="no-visibility">
                                                        <input name="h" id="h" type="text" class="no-visibility">
                                                        <input name="r" id="r" type="text" class="no-visibility">
                                                        <input name="scalex" id="scalex" type="text"
                                                               class="no-visibility">
                                                        <input name="scaley" id="scaley" type="text"
                                                               class="no-visibility">
                                                    </div>
                                                </div>

                                                <div class="col-md-3 scrollspy">
                                                    <div id="img-preview" data-spy="" class="no-visibility "
                                                         style="width: 190px; height: 190px;"></div>
                                                </div>
                                            </div>

                                            <div id="cropper-module" class="no-visibility">
                                                @include('modules/cropper')
                                            </div>

                                            <div id="my_buttons" class="col-md-12">
                                                <div class="col-md-4">
                                                    <label class="buttn" for="img_upload"><i class="icon-camera"></i>Téléchargez une photo</label>
                                                </div>
                                                <div class="col-md-4">

                                                    <a class="butt  n" href="#" id="use-webcam"><i class="icon-facetime-video"></i>Utilisez votre webcam</a>
                                                </div>
                                            </div>

                                            <div id="validate_buttons" class="col-md-12 text-center no-visibility">

                                                <button id="back_button"
                                                        class="button button-3d button-small button-rounded button-teal">
                                                    Retour
                                                </button>

                                                <button type="submit"
                                                        class="button button-3d button-small button-rounded nice-orange">
                                                    Valider cette photo
                                                </button>
                                            </div>


                                            <script>
                                                $(document).ready(function () {

//                                            $("#img-preview").affix({
//                                                offset: {
//                                                    top: $("#img-preview").offset().top,
//                                                    bottom: ($('#validate_buttons').outerHeight(true) + $('#footer').outerHeight(true)) + 150
//                                                }
//                                            });
                                                });
                                                //--------

                                                function imgUpload() {
                                                    $("#validate_buttons").toggleClass('no-visibility');
                                                    $("#img-preview").toggleClass('no-visibility');
                                                    $("#cropper-module").toggleClass('no-visibility');
                                                    $("#image").toggleClass('no-visibility');
                                                    $("#my_buttons").toggleClass('no-visibility');
                                                    $("#img-question-mark").toggleClass('no-visibility');
                                                    $('.img-container').toggleClass('no-visibility');

                                                }

                                                $("#img_upload").change(function () {
                                                    imgUpload();
                                                });

                                                $("#use-webcam").click(function () {
                                                    Webcam.set({
                                                        width: 210,
                                                        height: 190,
                                                        dest_width: 190,
                                                        dest_height: 170
                                                    });

                                                    Webcam.attach('#my_camera');
                                                    $("#webcam").removeClass('no-visibility');
                                                    $("#validate_buttons").removeClass('no-visibility');
                                                    $("#img-question-mark").addClass('no-visibility');
                                                    $("#my_buttons").addClass('no-visibility');
                                                    $("#current_picture").addClass('no-visibility');
                                                });

                                                $("#back_button").click(function (e) {
                                                    e.preventDefault();
                                                    Webcam.reset();

                                                    $().cropper('destroy');
                                                    $('.cropper-container').html('');
                                                    $('.cropper-container').toggleClass('no-visibility');

                                                    imgUpload();
                                                });

                                                function take_snapshot() {
                                                    Webcam.snap(function (data_uri) {
                                                        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

                                                        document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
                                                        $("#webcam_img").val(raw_image_data);
                                                        $('.img-container').removeClass('no-visibility');
                                                        //$("#image").removeClass('no-visibility');
                                                        $("#capture").removeClass('no-visibility');
                                                    });
                                                }

                                            </script>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="col-md-10 topmargin-lg">
                                    <h4>Mettre à jour mes informations</h4>

                                    {!! Form::model($user, ['url' => '/editer-profil']) !!}

                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            {!! Form::label('gender_man', 'Homme') !!}
                                            {!! Form::radio('gender','man', $user->gender,['class' => '', 'id' => 'gender_man']) !!}
                                        </div>

                                        <div class="col-md-6">
                                            {!! Form::label('gender_woman', 'Femme') !!}
                                            {!! Form::radio('gender','woman', $user->gender,['class' => '', 'id' => 'gender_woman']) !!}
                                        </div>

                                    </div>

                                    <div class="form-group col-md-12">
                                        {!! Form::label('firstname', 'Prénom') !!}
                                        {!! Form::text('firstname', $user->firstname, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-12">
                                        {!! Form::label('lastname', 'Nom') !!}
                                        {!! Form::text('lastname', $user->lastname, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="control-group">
                                            <label for="dob-day" class="control-label">Date de naissance</label>
                                            <div class="controls">
                                                {{ Form::select('dobday', [
                                                    ""=>"Jour",
                                                    "01"=>"01",
                                                    "02"=>"02",
                                                    "03"=>"03",
                                                    "04"=>"04",
                                                    "05"=>"05",
                                                    "06"=>"06",
                                                    "07"=>"07",
                                                    "08"=>"08",
                                                    "09"=>"09",
                                                    "10"=>"10",
                                                    "11"=>"11",
                                                    "12"=>"12",
                                                    "13"=>"13",
                                                    "14"=>"14",
                                                    "15"=>"15",
                                                    "16"=>"16",
                                                    "17"=>"17",
                                                    "18"=>"18",
                                                    "19"=>"19",
                                                    "20"=>"20",
                                                    "21"=>"21",
                                                    "22"=>"22",
                                                    "23"=>"23",
                                                    "24"=>"24",
                                                    "25"=>"25",
                                                    "26"=>"26",
                                                    "27"=>"27",
                                                    "28"=>"28",
                                                    "29"=>"29",
                                                    "30"=>"30",
                                                    "31"=>"31",
                                                    ], $dobday ?? null)}}

                                                {{ Form::select('dobmonth', [
                                                    ""=>"Mois",
                                                    "01"=>"Janvier",
                                                    "02"=>"Février",
                                                    "03"=>"Mars",
                                                    "04"=>"Avril",
                                                    "05"=>"Mai",
                                                    "06"=>"Juin",
                                                    "07"=>"Juillet",
                                                    "08"=>"Août",
                                                    "09"=>"Septembre",
                                                    "10"=>"Octobre",
                                                    "11"=>"Novembre",
                                                    "12"=>"Décembre"
                                                    ], $dobmonth ?? null)}}

                                                {{ Form::select('dobyear', [

                                            ""=>"Année",
                                            "2012"=>"2012",
                                            "2011"=>"2011",
                                            "2010"=>"2010",
                                            "2009"=>"2009",
                                            "2008"=>"2008",
                                            "2007"=>"2007",
                                            "2006"=>"2006",
                                            "2005"=>"2005",
                                            "2004"=>"2004",
                                            "2003"=>"2003",
                                            "2002"=>"2002",
                                            "2001"=>"2001",
                                            "2000"=>"2000",
                                            "1999"=>"1999",
                                            "1998"=>"1998",
                                            "1997"=>"1997",
                                            "1996"=>"1996",
                                            "1995"=>"1995",
                                            "1994"=>"1994",
                                            "1993"=>"1993",
                                            "1992"=>"1992",
                                            "1991"=>"1991",
                                            "1990"=>"1990",
                                            "1989"=>"1989",
                                            "1988"=>"1988",
                                            "1987"=>"1987",
                                            "1986"=>"1986",
                                            "1985"=>"1985",
                                            "1984"=>"1984",
                                            "1983"=>"1983",
                                            "1982"=>"1982",
                                            "1981"=>"1981",
                                            "1980"=>"1980",
                                            "1979"=>"1979",
                                            "1978"=>"1978",
                                            "1977"=>"1977",
                                            "1976"=>"1976",
                                            "1975"=>"1975",
                                            "1974"=>"1974",
                                            "1973"=>"1973",
                                            "1972"=>"1972",
                                            "1971"=>"1971",
                                            "1970"=>"1970",
                                            "1969"=>"1969",
                                            "1968"=>"1968",
                                            "1967"=>"1967",
                                            "1966"=>"1966",
                                            "1965"=>"1965",
                                            "1964"=>"1964",
                                            "1963"=>"1963",
                                            "1962"=>"1962",
                                            "1961"=>"1961",
                                            "1960"=>"1960",
                                            "1959"=>"1959",
                                            "1958"=>"1958",
                                            "1957"=>"1957",
                                            "1956"=>"1956",
                                            "1955"=>"1955",
                                            "1954"=>"1954",
                                            "1953"=>"1953",
                                            "1952"=>"1952",
                                            "1951"=>"1951",
                                            "1950"=>"1950",
                                            ], $dobyear ?? null)}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-12">
                                        {!! Form::label('telephone', 'Mobile') !!}
                                        {!! Form::text('telephone', $user->telephone, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="col-md-10">
                                        <button class="btn btn-success" type="submit">Mettre mon profil à jour</button>
                                    </div>

                                    {!! Form::close() !!}
                                </div>

                            </div>
                        @endif
                    </div>

                    @include('dates.dates')
                @show
            </div>
        </div>
    </div>

@endsection