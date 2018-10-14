{!! HTML::script("js/webcam.min.js") !!}
{!! HTML::style('css/fa/css/font-awesome.min.css')!!}
{!! HTML::script("js/slim.jquery.min.js") !!}
{!! HTML::style('css/slim.min.css')!!}

@include('professeur.process-steps.process-steps', ['step1' => 'complete', 'step2' => 'complete', 'step3' => 'complete', 'step4' => 'complete', 'step5' => 'complete', 'step6' => 'active'])

<div class="container">

    @include('includes.inputErrors')

    @if(\Illuminate\Support\Facades\Request::is('*modifier-annonce*'))
        <form class="avatar" id="presentation-content" accept-charset="UTF-8"
              action="/modifier-annonce-6/{{$advert->id}}" method="POST" enctype="multipart/form-data"
              data-parsley-validate>
            @else
                <form class="avatar" id="presentation-content" accept-charset="UTF-8"
                      action="/nouvelle-annonce-6" method="POST" enctype="multipart/form-data" data-parsley-validate>
                    @endif

                    {!! csrf_field() !!}

                    <h2 class="col-md-12 center">@lang('professeur/partials/step6.smileTitle')</h2>

                    <div class="col-md-12 center">
                        <h5>@lang('professeur/partials/step6.pleaseSmile')</h5>

                    </div>

                    <div class="col-md-12 center topmargin-sm">

                        <div id="img-container">
                        </div>

                        <div class="clearfix"></div>

                        <div id="upload" style="width: 190px; height: auto; text-align: center; margin: auto">
                            @if(isset($advert) and \App\Models\Avatar::hasAdvertAvatar($advert->user_id, $advert->id))
                                <img id="current_picture" src="{{"/avatarb/$advert->user_id/$advert->id"}}" alt="">
                            @endif
                                <input type="file" name="img_upload" id="img_upload">
                        </div>

                        <button type="submit" class="button button-3d button-large button-rounded" id="submitStep6">
                            @lang('professeur/partials/step6.iChoseMyPicture')
                        </button>

                        <div class="hidden" id="textPutImage">@lang('professeur/partials/step6.putImageHere')</div>
                        <script>
                            $(document).ready(function () {

                                $('#upload').slim({
                                    ratio: '1:1',
                                    label: $('#textPutImage').html(),
                                    uploadBase64: false,
                                    jpegCompression: 70
                                });
                            });

                        </script>
                    </div>
        {!! Form::close() !!}
</div>
