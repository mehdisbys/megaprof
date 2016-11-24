<div class="row topmargin-sm">
    <div class="col-md-9 docs-buttons">
        <!-- <h3 class="page-header">Toolbar:</h3> -->


        <div class="btn-group">


        </div>

        <div class="btn-group">

        </div>

        <div class="btn-group btn-group-crop">

            <button type="button"
                    id="previewButton"
                    class="btn btn-primary"
                    data-method="getCroppedCanvas"
                    data-option="{ &quot;width&quot;: 190, &quot;height&quot;: 190 }">
            <span class="docs-tooltip"
                  title="$().cropper(&quot;getCroppedCanvas&quot;, { width: 190, height: 190 })">
              Aperçu
            </span>
            </button>
        </div>
    </div><!-- /.docs-buttons -->
    <!-- /.docs-toggles -->
</div>

<script>

    $(function () {
        'use strict';

        var console = window.console || { log: function () {} };
        var $image = $('#image');
        var $dataX = $('#x');
        var $dataY = $('#y');
        var $dataHeight = $('#h');
        var $dataWidth  = $('#w');
        var $dataRotate = $('#r');
        var $dataScaleX = $('#scalex');
        var $dataScaleY = $('#scaley');
        var img_upload = "#img_upload";
        var img_preview = $("#img-preview");

        var options = {
            aspectRatio: 1,
            preview: '.img-preview',
            viewMode: 0,
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
            'crop.cropper': function (e) {
            },
            'zoom.cropper': function (e) {
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
                        }
                    }
                }

                result = $image.cropper(data.method, data.option, data.secondOption);

                if (result)
                {
                    img_preview.html(result);
                }
            }
        });

        // Import image
        var $inputImage = $(img_upload);
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
                            // URL.revokeObjectURL(blobURL);
                        }).cropper('reset').cropper('replace', blobURL);
                        //$inputImage.val('');
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