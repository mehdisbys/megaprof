@extends('layouts.master')

@section('content')

    {!! HTML::script("js/parsley.min.js")!!}
    {!! HTML::script("js/webcam.min.js") !!}
    {!! HTML::script("js/cropper.js") !!}
    {!! HTML::style('css/fa/css/font-awesome.min.css')!!}
    {!! HTML::style('css/cropper.min.css')!!}

    <form id="presentation-content"  accept-charset="UTF-8"
          action="/nouvelle-annonce-6" method="POST"  enctype="multipart/form-data">

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
                </div>
            </div>

            <div class="clearfix"></div>

            <input type="file" id="img_upload" name="img_upload" class="no-visibility" accept="image/*">
            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">

            <div class="row">

                <div class="col-md-8">
                    <!-- <h3 class="page-header">Demo:</h3> -->
                    <div class="img-container">
                        <img id="image" src="" alt="Votre Image" name="image" class="no-visibility">

                        <input name="x" id="x" type="text" class="no-visibility">
                        <input name="y" id="y" type="text" class="no-visibility">
                        <input name="w" id="w" type="text" class="no-visibility">
                        <input name="h" id="h" type="text" class="no-visibility">
                        <input name="r" id="r" type="text" class="no-visibility">
                        <input name="scalex" id="scalex" type="text" class="no-visibility">
                        <input name="scaley" id="scaley" type="text" class="no-visibility">

                    </div>
                </div>

                <div class="col-md-3" >
                    <div id="img-preview"  class="no-visibility topmargin-lg" style="width: 190px; height: 190px;"></div>
                </div>

            </div>

            <div id="cropper-module" class="no-visibility">
                @include('modules/cropper')
            </div>

            <div id="my_buttons" class="">
                <label class="button" for="img_upload"><i class="icon-camera"></i>Téléchargez une photo</label>
                <a class="button" href="#" id="use-webcam"><i class="icon-facetime-video"></i>Utilisez votre webcam</a>
            </div>

            <div id="validate_buttons" class="col-md-12 text-center topmargin-sm no-visibility">

                <button id="back_button" class="button button-3d button-large button-rounded button-teal">
                    Retour
                </button>

                <button type="submit" class="button button-3d button-large button-rounded button-green">
                    Valider cette photo
                </button>
            </div>

            <script>
                //--------
                function readURL(input, target) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $(target).attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#img_upload").change(function() {
                    $("#validate_buttons").toggleClass('no-visibility');
                    $("#img-preview").toggleClass('no-visibility');
                    $("#cropper-module").toggleClass('no-visibility');
                    $("#image").toggleClass('no-visibility');
                    $("#my_buttons").toggleClass('no-visibility');
                    $("#img-question-mark").toggleClass('no-visibility');
                });

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
                    });
                }

            </script>
        </div>
    {!! Form::close() !!}
@endsection