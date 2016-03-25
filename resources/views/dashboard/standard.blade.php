@extends('dashboard.index')

@section('dashboard-content')
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
                            @if($booking->isStudent() and $booking->wasAccepted())
                                <div class="clearfix"></div>
                                <div class="col-md-12">Contactez votre professeur :</div>
                                <div class="col-md-12">E-mail: {{$booking->prof->email}}</div>
                                <!-- TODO put real telephone contact -->
                                <div class="col-md-12">Telephone: 06 01 02 03 04</div>

                            @endif

                            <div class="pull-right"><i class="icon-location"></i><strong>Paris</strong></div>

                            <div class="col-md-12">
                                Reçue le {{$booking->created_at->format('m/d/Y à H:i') }}
                            </div>
                        </div>

                        @if($booking->isProf())
                            <div class="col-md-2 topmargin-sm">
                                @if($booking->wasAccepted())
                                    <div class="green">Vous avez accepté cette demande</div>

                                @elseif($booking->wasRejected())
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
                            @if($booking->wasAccepted())
                                <div class="green">Votre demande a été acceptée</div>

                            @elseif($booking->wasRejected())
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
    <div class="tab-container col-md-8">

        <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-40"
             aria-labelledby="ui-id-28" role="tabpanel" aria-expanded="false" aria-hidden="true"
             style="display: none;">
            <h4>Modifier mon profil</h4>

        </div>
    </div>
@stop

