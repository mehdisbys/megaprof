{!! HTML::script("js/webcam.min.js") !!}
{!! HTML::style('css/fa/css/font-awesome.min.css')!!}

@if(isset($advert))
    <form id="presentation-content" accept-charset="UTF-8"
          action="/modifier-annonce-6/{{$advert->id}}" method="POST" enctype="multipart/form-data"
          data-parsley-validate>
        @else
            <form id="presentation-content" accept-charset="UTF-8"
                  action="/nouvelle-annonce-6" method="POST" enctype="multipart/form-data" data-parsley-validate>
                @endif

                {!! csrf_field() !!}

                <h2 class="col-md-12 center">@lang('avatar/uploadPicture.smile')</h2>

                <div class="col-md-12 center">
                    <h5>@lang('avatar/uploadPicture.smileDesc')</h5>
                </div>

                <div class="col-md-12 center topmargin-sm">

                    <div id="img-container">
                        @if(isset($advert))
                            <img src="{{ $advert->getAvatar() }}" alt="">
                        @else
                            {!! HTML::image('images/question-mark-face.jpg', null, ["style" => "width:350px; height:200px;", 'id' => 'img-question-mark']) !!}
                        @endif

                        <div class="clearfix"></div>

                        <div id="webcam" class="no-visibility col-md-3 col-md-offset-3">
                            <div id="my_camera"></div>
                            <a href="javascript:void(take_snapshot())"
                               class="button button-3d button-mini button-rounded button-blue">@lang('avatar/uploadPicture.takePicture')</a>
                            <input type="hidden" name="webcam_img" id="webcam_img">

                        </div>

                        <div id="capture" class="col-md-3 no-visibility">
                            <div id="my_result" style="" class=""></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <input type="file" id="img_upload" name="img_upload" class="no-visibility" accept="image/*">
                    <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">

                    <div class="row" data-spy="scroll" data-target=".scrollspy">

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

                        <div class="col-md-3 scrollspy">
                            <div id="img-preview" data-spy="affix" class="no-visibility topmargin-lg"
                                 style="width: 190px; height: 190px;"></div>
                        </div>

                    </div>

                    <div id="cropper-module" class="no-visibility">
                        @include('modules/cropper')
                    </div>

                    <div id="my_buttons" class="">
                        <label class="button" for="img_upload"><i class="icon-camera"></i>@lang('avatar/uploadPicture.uploadPicture')</label>
                        <a class="button" href="#" id="use-webcam"><i class="icon-facetime-video"></i>@lang('avatar/uploadPicture.useWebcam')
                        </a>
                    </div>

                    <div id="validate_buttons" class="col-md-12 text-center topmargin-sm no-visibility">

                        <button id="back_button" class="button button-3d button-large button-rounded button-teal">
                            @lang('avatar/uploadPicture.cancelPicture')
                        </button>

                        <button type="submit" class="button button-3d button-large button-rounded button-green">
                            @lang('avatar/uploadPicture.validatePicture')
                        </button>
                    </div>


                    <script></script>
                </div>
            </form>