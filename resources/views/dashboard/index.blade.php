@extends('layouts.master')

@section('content')
    {!! HTML::script("js/readmore.min.js")!!}


    <div class="tabs tabs-alt tabs-justify clearfix ui-tabs ui-widget ui-widget-content ui-corner-all" id="tab-10">

        <ul class="tab-nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
            role="tablist">
            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0"
                aria-controls="tabs-37" aria-labelledby="ui-id-25" aria-selected="true" style="width: 207px;"><a
                        href="#tabs-37" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-25">Tableau
                    de bord</a></li>

            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-38"
                aria-labelledby="ui-id-26" aria-selected="false" style="width: 207px;"><a href="#tabs-38"
                                                                                          class="ui-tabs-anchor"
                                                                                          role="presentation"
                                                                                          tabindex="-1" id="ui-id-26">Mes
                    demandes de cours</a>
            </li>

            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-39"
                aria-labelledby="ui-id-27" aria-selected="false" style="width: 207px;"><a href="#tabs-39"
                                                                                          class="ui-tabs-anchor"
                                                                                          role="presentation"
                                                                                          tabindex="-1" id="ui-id-27">Mes
                    annonces</a>
            </li>

            <li class="hidden-phone ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-40"
                aria-labelledby="ui-id-28" aria-selected="false" style="width: 207px;"><a href="#tabs-40"
                                                                                          class="ui-tabs-anchor"
                                                                                          role="presentation"
                                                                                          tabindex="-1" id="ui-id-28">Gérer
                    mon profil</a>
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

        <div class="tab-container col-md-8 topmargin-lg">

            <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-37"
                 aria-labelledby="ui-id-25" role="tabpanel" aria-expanded="true" aria-hidden="false"
                 style="display: block;">
                <h4>Notifications</h4>
            </div>
            <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-38"
                 aria-labelledby="ui-id-26" role="tabpanel" aria-expanded="false" aria-hidden="true"
                 style="display: none;">
                <h4>Mes demandes de cours</h4>

                <div>
                    @foreach($bookings as $booking)

                        <article class="gray-background" id="booking_{{$booking->id}}">
                            <div class="col-md-8 topmargin-sm">
                                <div class="col-md-2">
                                    {!! HTML::image('images/question-mark-face.jpg',
                                    null, ["style" => "width:90px;", 'id' => 'img-question-mark']) !!}

                                    <div> {{ $booking->student->firstname }} </div>
                                </div>

                                @if($booking->isStudent())
                                    <em> Vous avez contacté <strong>{{ $booking->prof->firstname }}</strong> pour un
                                        cours</em>
                                @else
                                    <em><strong>{{ $booking->student->firstname }}</strong> vous a contacté pour un
                                        cours</em>
                                @endif

                                <div class="">{{ $booking->presentation }}</div>

                                <div class="pull-right"><i class="icon-location"></i><strong>Paris</strong></div>

                                <div class="col-md-12">
                                    Reçue le {{$booking->created_at->format('m/d/Y à H:i') }}
                                </div>
                            </div>

                            @if($booking->isProf())
                                <div class="col-md-2 topmargin-sm">
                                    @if($booking->answer == 'yes')
                                        <div class="green">Vous avez accepté cette demande</div>

                                    @elseif($booking->answer == 'no')
                                        <div class="">Vous avez refusé cette demande</div>

                                    @else
                                        <div id="booking_{{$booking->id}}_accept"
                                             class="button button-small button-white button-rounded"><a
                                                    href="/demande/{{$booking->id}}/yes">Accepter</a>
                                        </div>

                                        <div id="booking_{{$booking->id}}_refuse"
                                             class="button button-small button-gray button-rounded"><a
                                                    href="/demande/{{$booking->id}}/no">Refuser</a>
                                        </div>
                                    @endif
                                </div>
                            @elseif($booking->isStudent())
                                @if($booking->answer == 'yes')
                                    <div class="green">Votre demande a été acceptée</div>

                                @elseif($booking->answer == 'no')
                                    <div class="">Votre demande a été refusée</div>

                                @else
                                    <div class="">Demande en attente de réponse</div>
                                @endif
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="tab-container col-md-8">

            <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-39"
                 aria-labelledby="ui-id-27" role="tabpanel" aria-expanded="false" aria-hidden="true"
                 style="display: none;">
                <h4>Mes annonces</h4>
                @foreach($adverts as $advert)

                    <div class="gray-backround" data-readmore aria-expanded="false">
                        <div class="col-md-2">
                            <img src="{{ $advert->getAvatar() }}" style="width:90px;">
                        </div>
                        <div class="col-md-6">
                            <div>{{ str_limit($advert->title, 55)}}</div>

                            <div class="col-md-12 topmargin-sm">
                                @foreach($advert->subjectsPerAd as $subject)
                                    <div class="btn btn-default btn-xs">{{\App\Models\SubSubject::find($subject->subject_id)->name}}</div>
                                    <div class="clearfix"></div>
                                @endforeach
                            </div>

                            <div class="pull-right topmargin-sm">
                                <i class="icon-location"></i><strong>{{ $advert->location_city }}</strong>
                            </div>

                            <div class="col-md-12"> Dernière
                                modification: {{$advert->updated_at->format('m/d/Y H:i') }}</div>
                        </div>

                        <div class="col-md-2">
                            <div class="button button-small button-white button-rounded"><a
                                        href="/deactivate/{{$advert->id}}/">Désactiver</a></div>
                            <div class="button button-small button-leaf button-rounded"><a
                                        href="/{{$advert->slug}}">Voir</a>
                            </div>
                            <div class="button button-yellow button-rounded">
                                <a href="/modifier-annonce-1/{{$advert->id}}">Modifier</a></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-40"
             aria-labelledby="ui-id-28" role="tabpanel" aria-expanded="false" aria-hidden="true"
             style="display: none;">
            <h4>Modifier mon profil</h4>

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