@extends('dashboard.index')

@section('dashboard-content')
    <div class="tab-container col-md-12 topmargin-lg">

        <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-37"
             aria-labelledby="ui-id-25" role="tabpanel" aria-expanded="true" aria-hidden="false"
             style="display: block;">
            <h4>Notifications</h4>
            @include('notifications.list', ['notifications' => $notifications])

            <div class="clearfix"></div>

            <h4 class="topmargin-sm">Dernières demandes de cours</h4>
            @include('bookings.list', ['bookings' => $recentRequests, 'summary' => 'yes'])
        </div>
        <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-38"
             aria-labelledby="ui-id-26" role="tabpanel" aria-expanded="false" aria-hidden="true"
             style="display: none;">
            <h4>Mes demandes de cours</h4>

            <div class="col-md-12">
                @include('bookings.list')
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

