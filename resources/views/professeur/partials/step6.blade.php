{!! HTML::script("js/webcam.min.js") !!}
{!! HTML::script("js/cropper.js") !!}
{!! HTML::style('css/fa/css/font-awesome.min.css')!!}
{!! HTML::style('css/cropper.min.css')!!}

@if(isset($advert) == false)
@include('professeur.process-steps.process-steps', ['step1' => 'complete', 'step2' => 'complete', 'step3' => 'complete', 'step4' => 'complete', 'step5' => 'complete', 'step6' => 'active'])
@endif

@if(isset($advert))
    <form id="presentation-content"  accept-charset="UTF-8"
          action="/modifier-annonce-6/{{$advert->id}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        @else
            <form id="presentation-content"  accept-charset="UTF-8"
                  action="/nouvelle-annonce-6" method="POST" enctype="multipart/form-data" data-parsley-validate>
                @endif

                {!! csrf_field() !!}

                <h2 class="col-md-12 center">Montrez votre plus beau sourire !</h2>

                <div class="col-md-12 center">
                    <h5>Vous êtes sympathique, montrez-le ! Votre photo sera l'atout majeur de votre annonce pour donner confiance à vos élèves, elle est non seulement importante mais obligatoire pour que votre annonce soit en ligne</h5>
                </div>

                <div class="col-md-12 center topmargin-sm">

                    <div id="img-container">

                        <img  id="current_picture" src="{{ getAvatar(\Auth::id()) }}" alt="">

                        <div class="clearfix"></div>

                        <div id="webcam" class="no-visibility col-md-3 col-md-offset-3">
                            <div id="my_camera"></div>
                            <a href="javascript:void(take_snapshot())" class="button button-3d button-mini button-rounded button-blue">Prendre la photo</a>
                            <input type="hidden" name="webcam_img" id="webcam_img">

                        </div>

                        <div id="capture" class="col-md no-visibility">
                            <div id="my_result" style="" class=""></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <input type="file" id="img_upload" name="img_upload" class="no-visibility" accept="image/*">
                    <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">

                    <div class="row-spy" data-spy="scroll" data-target=".scrollspy">

                        <div class="col-md-8">
                            <!-- <h3 class="page-header">Demo:</h3> -->
                            <div class="img-container no-visibility">
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

                        <div class="col-md-3 scrollspy" >
                            <div id="img-preview" data-spy="affix" class="no-visibility topmargin-lg" style="width: 190px; height: 190px;"></div>
                        </div>

                    </div>

                    <div id="cropper-module" class="no-visibility">
                        @include('modules/cropper')
                    </div>

                    <div id="my_buttons" class="">
                        <label class="button" for="img_upload"><i class="icon-camera"></i>Téléchargez une photo</label>
                        <a class="button" href="#" id="use-webcam"><i class="icon-facetime-video"></i>Utilisez votre webcam</a>
                    </div>

                    <div id="validate_buttons" class="col-md-12 text-center no-visibility">

                        <button id="back_button" class="button button-3d button-large button-rounded button-teal">
                            Retour
                        </button>

                        <button type="submit" class="button button-3d button-large button-rounded button-green">
                            Valider cette photo
                        </button>
                    </div>



                    <script>
                        $( document ).ready(function() {

                            $("#img-preview").affix({
                                offset: {
                                    top: $("#img-preview").offset().top,
                                    bottom: ($('#validate_buttons').outerHeight(true) + $('#footer').outerHeight(true)) + 150
                                }
                            });
                        });
                        //--------

                        function imgUpload(){
                            $("#validate_buttons").toggleClass('no-visibility');
                            $("#img-preview").toggleClass('no-visibility');
                            $("#cropper-module").toggleClass('no-visibility');
                            $("#image").toggleClass('no-visibility');
                            $("#my_buttons").toggleClass('no-visibility');
                            $("#img-question-mark").toggleClass('no-visibility');
                            $('.img-container').toggleClass('no-visibility');

                        }

                        $("#img_upload").change(function() { imgUpload(); });

                        $("#use-webcam").click(function(){
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

                        $("#back_button").click(function(e){
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

                                document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
                                $("#webcam_img").val(raw_image_data);
                                $('.img-container').removeClass('no-visibility');
                                //$("#image").removeClass('no-visibility');
                                $("#capture").removeClass('no-visibility');
                            });
                        }

                    </script>
                </div>
    {!! Form::close() !!}