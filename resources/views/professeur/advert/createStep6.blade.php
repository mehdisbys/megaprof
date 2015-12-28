@extends('layouts.master')

@section('content')

    {!! HTML::script("js/parsley.min.js")!!}
    {!! HTML::script("js/webcam.min.js") !!}
    {!! HTML::script("js/jquery.Jcrop.min.js") !!}
    {!! HTML::script("js/cropper.js") !!}
    {!! HTML::style('css/jquery.Jcrop.min.css')!!}
    {!! HTML::style('css/cropper.min.css')!!}
    {!! HTML::style('css/fa/css/font-awesome.min.css')!!}

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
                    <a href="javascript:void(initJcrop())" class="button button-3d button-mini button-rounded button-blue">Recadrer</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <input type="file" id="img_upload" name="img_upload" class="no-visibility">
            <img id="previewHolder" class="img_preview"/>


            <div class="row">
                <div class="col-md-9">
                    <!-- <h3 class="page-header">Demo:</h3> -->
                    <div class="img-container">
                        <img id="image" src="" alt="Picture">
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- <h3 class="page-header">Preview:</h3> -->
                    <div class="docs-preview clearfix">
                        <div class="img-preview preview-xs"></div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-9 docs-buttons">
                    <!-- <h3 class="page-header">Toolbar:</h3> -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
              <span class="fa fa-arrows"></span>
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
              <span class="fa fa-crop"></span>
            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, 0.1)">
              <span class="fa fa-search-plus"></span>
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, -0.1)">
              <span class="fa fa-search-minus"></span>
            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, -10, 0)">
              <span class="fa fa-arrow-left"></span>
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 10, 0)">
              <span class="fa fa-arrow-right"></span>
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 0, -10)">
              <span class="fa fa-arrow-up"></span>
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 0, 10)">
              <span class="fa fa-arrow-down"></span>
            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
              <span class="fa fa-rotate-left"></span>
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, 45)">
              <span class="fa fa-rotate-right"></span>
            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleX&quot;, -1)">
              <span class="fa fa-arrows-h"></span>
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleY&quot;, -1)">
              <span class="fa fa-arrows-v"></span>
            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;crop&quot;)">
              <span class="fa fa-check"></span>
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;clear&quot;)">
              <span class="fa fa-remove"></span>
            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;disable&quot;)">
              <span class="fa fa-lock"></span>
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;enable&quot;)">
              <span class="fa fa-unlock"></span>
            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;reset&quot;)">
              <span class="fa fa-refresh"></span>
            </span>
                        </button>
                        <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
            <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
              <span class="fa fa-upload"></span>
            </span>
                        </label>
                        <button type="button" class="btn btn-primary" data-method="destroy" title="Destroy">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;destroy&quot;)">
              <span class="fa fa-power-off"></span>
            </span>
                        </button>
                    </div>

                    <div class="btn-group btn-group-crop">

                        </button>
                        <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;, { width: 160, height: 90 })">
              160&times;90
            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;, { width: 190, height: 190 })">
              320&times;180
            </span>
                        </button>
                    </div>

                    <!-- Show the cropped image in modal -->
                    <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                                    <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.png">Valider</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->
                </div><!-- /.docs-buttons -->
                <!-- /.docs-toggles -->
            </div>


            <script>

                $(function () {

                    'use strict';

                    var console = window.console || { log: function () {} };
                    var $image = $('#image');
                    var $download = $('#download');
                    var $dataX = $('#dataX');
                    var $dataY = $('#dataY');
                    var $dataHeight = $('#dataHeight');
                    var $dataWidth = $('#dataWidth');
                    var $dataRotate = $('#dataRotate');
                    var $dataScaleX = $('#dataScaleX');
                    var $dataScaleY = $('#dataScaleY');
                    var options = {
                        aspectRatio: NaN,
                        preview: '.img-preview',
                        crop: function (e) {
                            $dataX.val(Math.round(e.x));
                            $dataY.val(Math.round(e.y));
                            $dataHeight.val(Math.round(e.height));
                            $dataWidth.val(Math.round(e.width));
                            $dataRotate.val(e.rotate);
                            $dataScaleX.val(e.scaleX);
                            $dataScaleY.val(e.scaleY);
                        }
                    };


                    // Tooltip
                    $('[data-toggle="tooltip"]').tooltip();


                    // Cropper
                    $image.on({
                        'build.cropper': function (e) {
                            console.log(e.type);
                        },
                        'built.cropper': function (e) {
                            console.log(e.type);
                        },
                        'cropstart.cropper': function (e) {
                            console.log(e.type, e.action);
                        },
                        'cropmove.cropper': function (e) {
                            console.log(e.type, e.action);
                        },
                        'cropend.cropper': function (e) {
                            console.log(e.type, e.action);
                        },
                        'crop.cropper': function (e) {
                            console.log(e.type, e.x, e.y, e.width, e.height, e.rotate, e.scaleX, e.scaleY);
                            console.log($().cropper('getCroppedCanvas', { width: 320, height: 180 }));
                        },
                        'zoom.cropper': function (e) {
                            console.log(e.type, e.ratio);
                        }
                    }).cropper(options);


                    // Buttons
                    if (!$.isFunction(document.createElement('canvas').getContext)) {
                        $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
                    }

                    if (typeof document.createElement('cropper').style.transition === 'undefined') {
                        $('button[data-method="rotate"]').prop('disabled', true);
                        $('button[data-method="scale"]').prop('disabled', true);
                    }


                    // Download
                    if (typeof $download[0].download === 'undefined') {
                        $download.addClass('disabled');
                    }


                    // Options
                    $('.docs-toggles').on('change', 'input', function () {
                        var $this = $(this);
                        var name = $this.attr('name');
                        var type = $this.prop('type');
                        var cropBoxData;
                        var canvasData;

                        if (!$image.data('cropper')) {
                            return;
                        }

                        if (type === 'checkbox') {
                            options[name] = $this.prop('checked');
                            cropBoxData = $image.cropper('getCropBoxData');
                            canvasData = $image.cropper('getCanvasData');

                            options.built = function () {
                                $image.cropper('setCropBoxData', cropBoxData);
                                $image.cropper('setCanvasData', canvasData);
                            };
                        } else if (type === 'radio') {
                            options[name] = $this.val();
                        }

                        $image.cropper('destroy').cropper(options);
                    });


                    // Methods
                    $('.docs-buttons').on('click', '[data-method]', function () {
                        var $this = $(this);
                        var data = $this.data();
                        var $target;
                        var result;

                        if ($this.prop('disabled') || $this.hasClass('disabled')) {
                            return;
                        }

                        if ($image.data('cropper') && data.method) {
                            data = $.extend({}, data); // Clone a new one

                            if (typeof data.target !== 'undefined') {
                                $target = $(data.target);

                                if (typeof data.option === 'undefined') {
                                    try {
                                        data.option = JSON.parse($target.val());
                                    } catch (e) {
                                        console.log(e.message);
                                    }
                                }
                            }

                            result = $image.cropper(data.method, data.option, data.secondOption);

                            switch (data.method) {
                                case 'scaleX':
                                case 'scaleY':
                                    $(this).data('option', -data.option);
                                    break;

                                case 'getCroppedCanvas':
                                    if (result) {

                                        // Bootstrap's Modal
                                        $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);

                                        if (!$download.hasClass('disabled')) {
                                            $download.attr('href', result.toDataURL());
                                        }
                                    }

                                    break;
                            }

                            if ($.isPlainObject(result) && $target) {
                                try {
                                    $target.val(JSON.stringify(result));
                                } catch (e) {
                                    console.log(e.message);
                                }
                            }

                        }
                    });


                    // Keyboard
                    $(document.body).on('keydown', function (e) {

                        if (!$image.data('cropper') || this.scrollTop > 300) {
                            return;
                        }

                        switch (e.which) {
                            case 37:
                                e.preventDefault();
                                $image.cropper('move', -1, 0);
                                break;

                            case 38:
                                e.preventDefault();
                                $image.cropper('move', 0, -1);
                                break;

                            case 39:
                                e.preventDefault();
                                $image.cropper('move', 1, 0);
                                break;

                            case 40:
                                e.preventDefault();
                                $image.cropper('move', 0, 1);
                                break;
                        }

                    });

                    // Import image
                    var $inputImage = $('#inputImage');
                    var URL = window.URL || window.webkitURL;
                    var blobURL;

                    if (URL) {
                        $inputImage.change(function () {
                            var files = this.files;
                            var file;

                            if (!$image.data('cropper')) {
                                return;
                            }

                            if (files && files.length) {
                                file = files[0];

                                if (/^image\/\w+$/.test(file.type)) {
                                    blobURL = URL.createObjectURL(file);
                                    $image.one('built.cropper', function () {

                                        // Revoke when load complete
                                        URL.revokeObjectURL(blobURL);
                                    }).cropper('reset').cropper('replace', blobURL);
                                    $inputImage.val('');
                                } else {
                                    window.alert('Please choose an image file.');
                                }
                            }
                        });
                    } else {
                        $inputImage.prop('disabled', true).parent().addClass('disabled');
                    }
                });

            </script>

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

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#previewHolder').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#inputImage").change(function() {
                    $("#validate_buttons").removeClass('no-visibility');
                    $("#my_buttons").addClass('no-visibility');
                    $("#img-question-mark").addClass('no-visibility');
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
                        initJcrop("#my_result");
                    });
                }

                function showCoords(c)
                {
                    jQuery('#x').val(c.x);
                    jQuery('#y').val(c.y);
                    jQuery('#w').val(c.w);
                    jQuery('#h').val(c.h);
                };

                function initJcrop(el)
                {
                    $(el).Jcrop({
                        onchange:showCoords,
                        onSelect:showCoords

                    },function(){

                        var jcrop_api = this;
                        jcrop_api.animateTo([70,70,250,250]);

                        jcrop_api.setOptions({
                            minSize: [ 190, 190 ],
                            maxSize: [ 380, 380 ]
                        });
                        jcrop_api.setOptions({ allowResize: true});
                    });
                };
            </script>

        </div>
    {!! Form::close() !!}
@endsection