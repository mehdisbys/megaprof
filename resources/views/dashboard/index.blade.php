@extends('layouts.master')

@section('content')
    {!! HTML::script("js/readmore.min.js")!!}

    <div class="col-md-12">

        <div class="tabs tabs-alt tabs-justify clearfix ui-tabs ui-widget ui-widget-content ui-corner-all" id="tab-10">

            <ul class="tab-nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                role="tablist">
                <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0"
                    aria-controls="tabs-37" aria-labelledby="ui-id-25" aria-selected="true">
                    <a href="#tabs-37" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-25">Tableau de bord</a></li>

                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-38"
                    aria-labelledby="ui-id-26" aria-selected="false">
                    <a href="#tabs-38" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-26">Mes demandes de cours</a>
                </li>

                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-39"
                    aria-labelledby="ui-id-27" aria-selected="false">
                    <a href="#tabs-39" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-27">Mes annonces</a>
                </li>

                <li class="hidden-phone ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-40"
                    aria-labelledby="ui-id-28" aria-selected="false">
                    <a href="#tabs-40" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-28">Gérer mon profil</a>
                </li>
            </ul>

            <div class="col-md-3 dashboard-left-sidebar topmargin-lg leftmargin-sm">
                <div>
                    {!! HTML::image('images/question-mark-face.jpg', null, ["style" => "width:220px;", 'id' => 'img-question-mark']) !!}
                </div>

                <div id="confirm-profile" class="topmargin-sm gray-backround col-md-11">
                    <h3>Profil à confirmer</h3>
                    <ul class="iconlist-color leftmargin-sm" style="list-style: none;">
                        <li><i class="icon-exclamation-sign"></i> Téléphone</li>
                        <li><i class="icon-exclamation-sign"></i> E-mail</li>
                        <li><i class="icon-exclamation-sign"></i> Diplôme</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                @section('dashboard-content')

                @show
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {

                    $('article').readmore({
                        speed: 75,
                        lessLink: '<a href="#">Read less</a>'
                    });

                    var toggleDisplay = function () {
                        $('.booking_folded_request').on('click', function () {
                            var id = $(this).attr('id');
                            $('#' + id + "_snippet").toggleClass('no-visibility');
                            $('#' + id + "_display").toggleClass('no-visibility');
                        });
                    };

                    // toggleDisplay();
                }
        );
    </script>

@endsection