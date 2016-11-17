@extends('layouts.__master')

@section('content')
    {!! HTML::script("js/readmore.min.js")!!}

    <div class="col-md-12">

        <div class="col-md-12 clearfix">
            <div class="col-md-3">
                <img src="/avatar_dashboard/{{Auth::id()}}">
            </div>

        </div>

        <div class="col-md-12 tabs side-tabs">

            <div class="tabs side-tabs col-md-3" id="tab-10">
                <ul class="tab-nav tab-nav2" role="tablist">

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="0" aria-controls="tabs-37"
                        aria-labelledby="ui-id-25" aria-selected="true">
                        <a href="#tabs-37" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-25">Notifications</a></li>

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-38"
                        aria-labelledby="ui-id-26" aria-selected="false">
                        <a href="#tabs-38" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-26">Mes
                            demandes de cours
                        @if($bookings->count())
                            ({{$bookings->count()}})
                            @endif
                        </a>
                    </li>

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-48"
                        aria-labelledby="ui-id-46" aria-selected="false">
                        <a href="#tabs-48" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-26">Mes
                            commentaires
                            @if($pendingComments->count())
                                ({{$pendingComments->count()}})
                            @endif
                        </a>
                    </li>

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-39"
                        aria-labelledby="ui-id-27" aria-selected="false">
                        <a href="#tabs-39" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-27">Mes
                            annonces
                            @if ($adverts->count())
                                ({{$adverts->count()}})
                            @endif
                        </a>
                    </li>

                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-40"
                        aria-labelledby="ui-id-28" aria-selected="false">
                        <a href="#tabs-40" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-28">Gérer
                            mon
                            profil</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                @section('dashboard-content')

                    <div class="tab-container">

                        <div class="tab-content" id="tabs-37"
                             aria-labelledby="ui-id-25" role="tabpanel" aria-expanded="true" aria-hidden="false"
                             style="display: block;">
                            <h4>Notifications</h4>

                            @if($notifications->count())
                                @include('notifications.list', ['notifications' => $notifications])
                            @else
                                Vous avez lu toutes vos notifications.
                            @endif
                        </div>
                        <div class="tab-content" id="tabs-38"
                             aria-labelledby="ui-id-26" role="tabpanel" aria-expanded="false" aria-hidden="true"
                             style="display: none;">

                            <div class="clearfix"></div>
                            <h4>Mes demandes de cours</h4>
                            <div class="col-md-12">
                                @include('bookings.list')
                            </div>
                        </div>
                    </div>

                <div class="tab-content" id="tabs-48" aria-labelledby="ui-id-46" role="tabpanel" aria-expanded="false" aria-hidden="true"
                     style="display: none;">
                    @if(isset($pendingComments) and $pendingComments->count() > 0 )
                        <h4>Commentez vos derniers cours</h4>

                        <div class="col-md-8 bottommargin-sm">
                            @include('comments.pendingComments')
                        </div>
                    @endif
                </div>

                    <div class="tab-container">

                        <div class="tab-content " id="tabs-39"
                             aria-labelledby="ui-id-27" role="tabpanel" aria-expanded="false" aria-hidden="true"
                             style="display: none;">
                            <h4>Mes annonces</h4>
                            @foreach($adverts as $advert)

                                <div class="col-md-6 clearfix bottommargin-sm border1px" data-readmore aria-expanded="false">
                                    <div class="col-md-6 clearfix">
                                        <div class="bold">{{ $advert->title}}</div>

                                        <div class="col-md-12 topmargin-sm">
                                            @foreach($advert->subjectsPerAd as $subject)
                                                <div class="btn btn-default btn-xs">{{\App\Models\SubSubject::find($subject->subject_id)->name}}</div>
                                                <div class="clearfix"></div>
                                            @endforeach
                                        </div>

                                        <div class="pull-right topmargin-sm">
                                            <i class="icon-location"></i><strong>{{ $advert->location_city }}</strong>
                                        </div>

                                        <div class="col-md-12">{{$advert->updated_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-2">

                                    @if($advert->published_at != null)
                                        <div class="button button-small button-red button-rounded">
                                            <a href="/desactiver-annonce/{{$advert->id}}/">Désactiver</a>
                                        </div>
                                    @else
                                        <div class="button button-small button-lime button-rounded">
                                            <a href="/activer-annonce/{{$advert->id}}/">Activer</a>
                                        </div>
                                    @endif

                                    <div class="button button-small button-leaf button-rounded">
                                        <a href="/{{$advert->slug}}">Voir</a>
                                    </div>
                                    <div class="button button-yellow button-rounded">
                                        <a href="/modifier-annonce-1/{{$advert->id}}">Modifier</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-container col-md-8">

                        <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-40"
                             aria-labelledby="ui-id-28" role="tabpanel" aria-expanded="false" aria-hidden="true"
                             style="display: none;">
                            <h4>Modifier mon profil</h4>
                            <div class="col-md-8">
                                {!! Form::model($user, ['url' => '/editer-profil']) !!}

                                <div class="form-group col-md-12">
                                    <div class="col-md-6">
                                        {!! Form::label('gender_man', 'Homme') !!}
                                        {!! Form::radio('gender','man', $user->gender,['class' => '', 'id' => 'gender_man']) !!}
                                    </div>

                                    <div class="col-md-6">
                                        {!! Form::label('gender_woman', 'Femme') !!}
                                        {!! Form::radio('gender','woman', $user->gender,['class' => '', 'id' => 'gender_woman']) !!}
                                    </div>

                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::label('firstname', 'Prénom') !!}
                                    {!! Form::text('firstname', $user->firstname, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::label('lastname', 'Nom') !!}
                                    {!! Form::text('lastname', $user->lastname, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::label('birthdate', 'Date de naissance') !!}
                                    <input class="form-control pikaday-field" name="birthdate" type="text"
                                           value="{{$user->birthdate ? $user->birthdate->format("d/m/Y") : ''}}"
                                           id="birthdate">

                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::label('email', 'Email') !!}
                                    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::label('telephone', 'Mobile') !!}
                                    {!! Form::text('telephone', $user->telephone, ['class' => 'form-control']) !!}
                                </div>

                                <div class="col-md-10">
                                    <button class="btn btn-success" type="submit">Mettre mon profil à jour</button>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    @include('dates.dates')
                @show
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