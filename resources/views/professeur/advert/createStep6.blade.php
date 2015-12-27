@extends('layouts.master')

@section('content')

    {!! HTML::script("js/parsley.min.js")!!}
    {!! HTML::script("js/webcam.min.js") !!}
    {!! HTML::script("js/jquery.Jcrop.min.js") !!}
    {!! HTML::style('css/jquery.Jcrop.min.css')!!}

    <script type="text/javascript">



    </script>

    <form id="presentation-content"  accept-charset="UTF-8"
          action="/nouvelle-annonce-6" method="POST" data-parsley-validate>

        {!! csrf_field() !!}

        {!! Form::hidden('advert_id', $advert_id) !!}

        <h2 class="col-md-12 center">Montrez votre plus beau sourire !</h2>

        <div class="col-md-12 center">
            <h5>Vous êtes sympathique, montrez-le ! Votre photo sera l'atout majeur de votre annonce pour donner confiance à vos élèves, elle est non seulement importante mais obligatoire pour que votre annonce soit en ligne</h5>
        </div>

        <div class="col-md-12 center topmargin-sm">

            <div id="img-container">
                {!! HTML::image('images/question-mark-face.jpg', null, ["style" => "width:350px; height:200px;", 'id' => 'img-question-mark']) !!}

                <div class="clearfix"></div>

                <div id="webcam" class="no-visibility col-md-5 col-md-offset-1">
                    <div id="my_camera"></div>
                    <a href="javascript:void(take_snapshot())" class="button button-3d button-mini button-rounded button-blue">Prendre la photo</a>
                </div>

                <div id="capture" class="col-md-5 no-visibility">
                    <div id="my_result" style="width:380px; height:380px;" class=""></div>
                    <a href="javascript:void(initJcrop())" class="button button-3d button-mini button-rounded button-blue">Recadrer</a>

                </div>

            </div>

            <div class="clearfix"></div>

            <input type="file" id="img_upload" name="img_upload" class="no-visibility">

            <div id="my_buttons" class="">
                <label class="button" for="img_upload"><i class="icon-camera"></i>Téléchargez une photo</label>
                <a class="button" href="#" id="use-webcam"><i class="icon-facetime-video"></i>Utilisez votre webcam</a>
            </div>

            <div id="validate_buttons" class="col-md-12 text-center topmargin-sm no-visibility">

                <button id="back_button" class="button button-3d button-large button-rounded button-teal">
                    Page Précédente
                </button>

                <button type="submit" class="button button-3d button-large button-rounded button-green">
                    Valider cette photo
                </button>
            </div>

            <script language="JavaScript">

                $("#use-webcam").click(function(){

                    Webcam.set({
                        width: 380,
                        height: 380,
                        dest_width: 380,
                        dest_height: 380
                    });

                    Webcam.attach('#my_camera');

                    $("#webcam").removeClass('no-visibility');
                    $("#validate_buttons").removeClass('no-visibility');
                    $("#img-question-mark").addClass('no-visibility');
                    $("#my_buttons").addClass('no-visibility');
                });

                $("#back_button").click(function(e){

                    e.preventDefault();
                    Webcam.reset();

                    $("#webcam").toggleClass('no-visibility');
                    $("#validate_buttons").toggleClass('no-visibility');
                    $("#img-question-mark").toggleClass('no-visibility');
                    $("#my_buttons").toggleClass('no-visibility');

                });

                function take_snapshot() {
                    Webcam.snap(function (data_uri) {
                        document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
                        $("#my_result").removeClass('no-visibility');
                        $("#capture").removeClass('no-visibility');
                        initJcrop();
                    });
                }

                var jcrop_api; // Holder for the API

                function initJcrop()
                {
                    $('#my_result').Jcrop({},function(){

                        jcrop_api = this;
                        jcrop_api.animateTo([70,70,250,250]);

                        jcrop_api.setOptions({
                            minSize: [ 250, 250 ],
                            maxSize: [ 250, 250 ]
                        });
                        jcrop_api.setOptions({ allowResize: false});
                    });
                };
            </script>



        </div>
    {!! Form::close() !!}
@endsection