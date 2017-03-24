{!! HTML::script("js/webcam.min.js") !!}
{!! HTML::script("js/slim.jquery.min.js") !!}
{!! HTML::style('css/fa/css/font-awesome.min.css')!!}
{!! HTML::style('css/slim.min.css')!!}

@if(isset($advert) == false)
    @include('professeur.process-steps.process-steps', ['step1' => 'complete', 'step2' => 'complete', 'step3' => 'complete', 'step4' => 'complete', 'step5' => 'complete', 'step6' => 'active'])
@endif

@if(isset($advert))
    <form class="avatar" id="presentation-content" accept-charset="UTF-8"
          action="/modifier-annonce-6/{{$advert->id}}" method="POST" enctype="multipart/form-data"
          data-parsley-validate>
        @else
            <form class="avatar" id="presentation-content" accept-charset="UTF-8"
                  action="/nouvelle-annonce-6" method="POST" enctype="multipart/form-data" data-parsley-validate>
                @endif

                {!! csrf_field() !!}

                <h2 class="col-md-12 center">Montrez votre plus beau sourire !</h2>

                <div class="col-md-12 center">
                    <h5>Vous êtes sympathique, montrez-le ! Votre photo sera l'atout majeur de votre annonce pour donner
                        confiance à vos élèves, elle est non seulement importante mais obligatoire pour que votre
                        annonce soit en ligne</h5>
                </div>

                <div class="col-md-12 center topmargin-sm">

                    <div id="img-container">
                    </div>

                    <div class="clearfix"></div>

                    <div id="upload" style="width: 190px; height: auto; text-align: center; margin: auto">
                        <img id="current_picture" src="{{ getAvatar(\Auth::id()) }}" alt="">
                        <input type="file" name="img_upload" id="img_upload">
                    </div>

                    <button type="submit" class="button button-3d button-large button-rounded button-green">
                        J'ai choisi ma photo
                    </button>

                    <div class="row-spy" data-spy="scroll" data-target=".scrollspy">

                        <div class="col-md-6">
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
                            <div id="img-preview" data-spy="affix" class="no-visibility "
                                 style="width: 190px; height: 190px;"></div>
                        </div>
                    </div>


                    <script>
                        $(document).ready(function () {

                            $('#upload').slim({
                                ratio: '1:1',
                                label: 'Déposez votre image ici ou cliquez',
                                uploadBase64: false
                            })
                            ;

                        });

                    </script>
                </div>
    {!! Form::close() !!}