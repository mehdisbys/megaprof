@extends('layouts.master')

@section('content')
    {!! HTML::script("js/webcam.min.js") !!}
    {!! HTML::script("js/jquery-confirm.js") !!}
    {!! HTML::style('css/fa/css/font-awesome.min.css')!!}
    {!! HTML::style('css/jquery-confirm.css')!!}
    {!! HTML::script("js/slim.jquery.min.js") !!}
    {!! HTML::style('css/slim.min.css')!!}
    {!! HTML::style('css/tabs.css')!!}

    {!! HTML::script("/js/plugins.js") !!}


    <div class="col-md-10 col-md-offset-1 container dashboard-main">

        @include('includes.info')

        <div class="col-md-12 row tabs side-tabs">

            <div class="col-md-3 col-xs-12" id="tab-10">
                <ul class="nav nav-tabs tabs-left topmargin-small" role="tablist">

                    <li class="active">

                        <img src="/avatar_dashboard/{{Auth::id()}}">

                        <div class="  " style="margin-left: 20px;">
                            @if(\App\Models\Avatar::hasAvatar(\Illuminate\Support\Facades\Auth::id()) == false)
                                <span class="topmargin-small"><i class="fa fa-warning" style="color: orange;"></i> Photo manquante</span>
                                <br>
                            @endif

                            @if( \App\Models\User::find(\Illuminate\Support\Facades\Auth::id())->hasConfirmedAccount() == false)
                                <span class="topmargin-small"><i class="fa fa-warning" style="color: orange;"></i> Email non vérifié </span>
                            @endif
                        </div>
                    </li>


                    <li class="active topmargin-small">
                        <a href="#notifications" id="ui-id-25" data-toggle="tab">Notifications
                            <span class="badge blue-badge notification-count">{{\App\Models\Notification::currentUserNotificationsCount()}}</span></a>
                    </li>

                    <li data-toggle="tab">
                        <a href="#bookings" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-26">Demandes
                            de cours
                            @if(isset($bookings) and $bookings->count())
                                <span class="badge red-badge">{{$bookings->count()}}</span>
                            @endif
                        </a>
                    </li>

                    <li data-toggle="tab">
                        <a href="#my-comments" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-26">Mes
                            commentaires
                            @if(isset($pendingComments) and $pendingComments->count())
                                <span class="badge green-badge">{{$pendingComments->count()}}</span>
                            @endif
                        </a>
                    </li>

                    <li data-toggle="tab">
                        <a href="#my-adverts" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-27">Mes
                            annonces
                            @if (isset($adverts))
                                <span class="badge">{{$adverts->count() + $toBeReviewedAdverts->count()}}</span>
                            @endif
                        </a>
                    </li>

                    <li data-toggle="tab">
                        <a href="#my-profile" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-28">Gérer
                            mon
                            profil</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 col-xs-12">
                @section('dashboard-content')

                    <div class="col-xs-12">

                        <div id="notifications">
                            <h4>Notifications</h4>

                            @if(isset($notifications) and $notifications->count())
                                @include('notifications.list', ['notifications' => $notifications])
                            @else
                                Vous avez lu toutes vos notifications.
                            @endif
                        </div>
                        <div id="bookings">
                            @if(isset($bookings) and $bookings->count())
                                <h4>Mes demandes de cours en attente de réponse</h4>
                                <div class="col-md-12">
                                    @include('bookings.list')
                                </div>
                            @endif
                            @if(isset($archivedBookings) and $archivedBookings->count())
                                <h4>Mes demandes de cours déjà traitées</h4>
                                <div class="col-md-12">
                                    @include('bookings.list', ['bookings' => $archivedBookings])
                                </div>
                            @endif
                            @if(isset($bookings) and $bookings->count() == 0 and isset($archivedBookings) and $archivedBookings->count() == 0)
                                <h4>Mes demandes de cours </h4>

                                <p>Vous n'avez pas encore fait ou reçu des demandes de cours</p>
                            @endif
                        </div>

                        <div id="my-comments">
                            @if(isset($pendingComments) and $pendingComments->count() > 0 )
                                <h4>Commentez vos derniers cours</h4>

                                @include('comments.pendingComments')
                            @else
                                <h4>Mes commentaires</h4>
                                <p>Pas de commentaires à afficher pour l'instant</p>
                            @endif
                        </div>
                    </div>



                    <div class="tab-container">

                        <div class="tab-content col-md-12" id="my-adverts"
                             aria-labelledby="ui-id-27" role="tabpanel" aria-expanded="false" aria-hidden="true"
                             style="display: none;">

                            @if(isset($toBeReviewedAdverts) and $toBeReviewedAdverts->count())
                                <h4>Mes annonces en cours de modération</h4>
                                @include('dashboard.adverts-list',['adverts' => $toBeReviewedAdverts])
                            @endif


                            <h4>Mes annonces publiées</h4>
                            @if(isset($adverts))
                                @include('dashboard.adverts-list',['adverts' => $adverts])
                            @elseif(isset($toBeReviewedAdverts) == false)
                                <p>Vous n'avez pas encore créé d'annonces</p>
                                <p><a id="donner-des-cours" class="button" href="/nouvelle-annonce-1">Donner des
                                        cours</a></p>
                            @endif

                            @if(isset($archivedAdverts) and $archivedAdverts->count())
                                <h4>Mes annonces hors-ligne</h4>
                                @include('dashboard.adverts-list',['adverts' => $archivedAdverts])

                            @endif
                        </div>
                    </div>
                    <div class="tab-container col-md-12">
                        @if(isset($user))
                            <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom"
                                 id="my-profile"
                                 aria-labelledby="ui-id-28" role="tabpanel" aria-expanded="false" aria-hidden="true"
                                 style="display: none;">
                                <h4>Changer ma photo</h4>
                                <div class="col-md-12">
                                    <form id="presentation-content" accept-charset="UTF-8"
                                          action="/avatar" method="POST" enctype="multipart/form-data"
                                          data-parsley-validate>

                                        {!! csrf_field() !!}

                                        <div class="col-md-12 center topmargin-sm">

                                            <div id="upload"
                                                 style="width: 190px; height: auto; text-align: center; margin: auto">
                                                @if(\App\Models\Avatar::hasAvatar(\Illuminate\Support\Facades\Auth::id()))

                                                    <img id="current_picture" src="{{ getAvatar(\Auth::id()) }}" alt="">
                                                @endif

                                                <input type="file" name="img_upload" id="img_upload">
                                            </div>


                                            <button type="submit"
                                                    class="button button-3d button-small button-rounded nice-orange">
                                                Valider cette photo
                                            </button>


                                            <script>
                                                $(document).ready(function () {

                                                    $('.close').on('click', function(){
                                                        $.get('/notifications', function(data){
                                                            $('.notification-count').each(function(index, element){ $(this).html(data.notificationsCount)})
                                                        });
                                                    });

                                                    $('.delete-advert').on('click', function (e) {

                                                                var link = $(this).attr('href');

                                                                e.preventDefault();
                                                                $.confirm({
                                                                    title: 'Suppression d\'annonce',
                                                                    content: "Êtes-vous sûr de vouloir supprimer cette annonce ?",
                                                                    buttons: {
                                                                        annuler: {
                                                                            text: 'Annuler',
                                                                            action: function () {
                                                                            }
                                                                        },
                                                                        confirmer: {
                                                                            text: 'Supprimer',
                                                                            btnClass: 'btn-red',
                                                                            action: function () {
                                                                                window.location.href = link;
                                                                            }
                                                                        }
                                                                    },
                                                                })
                                                                ;
                                                            }
                                                    );
                                                });
                                                //--------

                                                $('#upload').slim({
                                                    ratio: '1:1',
                                                    label: 'Déposez votre image ici ou cliquez',
                                                    uploadBase64: false,
                                                    jpegCompression: 70
                                                });


                                                function take_snapshot() {
                                                    Webcam.snap(function (data_uri) {
                                                        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

                                                        document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
                                                        $("#webcam_img").val(raw_image_data);
                                                        $('.img-container').removeClass('no-visibility');
                                                        //$("#image").removeClass('no-visibility');
                                                        $("#capture").removeClass('no-visibility');
                                                    });
                                                }

                                            </script>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="col-md-10 topmargin-lg">
                                    <h4>Mettre à jour mes informations</h4>

                                    {!! Form::model($user, ['url' => '/editer-profil', 'files' => true]) !!}

                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <i class="fa fa-male"></i> {!! Form::label('gender_man', 'Homme') !!}
                                            {!! Form::radio('gender','man', $user->gender,['class' => '', 'id' => 'gender_man']) !!}
                                        </div>

                                        <div class="col-md-6">
                                            <i class="fa fa-female"></i> {!! Form::label('gender_woman', 'Femme') !!}
                                            {!! Form::radio('gender','woman', $user->gender,['class' => '', 'id' => 'gender_woman']) !!}
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6 clearfix">
                                        {!! Form::label('firstname', 'Prénom') !!}
                                        {!! Form::text('firstname', $user->firstname, ['class' => 'sm-form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('lastname', 'Nom') !!}
                                        {!! Form::text('lastname', $user->lastname, ['class' => 'sm-form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-12">
                                        @include('includes.date-of-birth')
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::text('email', $user->email, ['class' => 'sm-form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('telephone', 'Mobile') !!}
                                        {!! Form::text('telephone', $user->telephone, ['class' => 'sm-form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-12 topmargin-sm">
                                        {!! Form::label('id_document', "Pièce d'identité (Professeurs Uniquement)") !!}

                                        <?php $idDocument = \App\Models\IdDocument::getByUserId(\Auth::id()) ?>

                                        @if($idDocument)
                                            <br>
                                            <a href="/carte-identite"><span><i
                                                            class="fa fa-id-card-o fa-2x bottommargin-sm"></i> {{$idDocument->id_card_name}}</span></a>
                                            <br>
                                        @endif

                                        <div class="input-group input-group-md">


                                            <div class="input-group-btn">

                                                <div class="btn btn-info">
                                                    <span class="hidden-xs">Télécharger ma carte d'identité</span>
                                                    <input
                                                            name="id_document"
                                                            id="input-8"
                                                            type="file"
                                                            accept=""
                                                            class=""
                                                            data-allowed-file-extensions="[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        {!! Form::label('id_document', "Diplômes / Certifications (Professeurs Uniquement)") !!}

                                        <?php $degreeDocument = \App\Models\DegreeDocument::getByUserId(\Auth::id()) ?>

                                        @if($degreeDocument)
                                            <br>
                                            <a href="/mon-diplome"><span><i
                                                            class="fa fa-graduation-cap fa-2x bottommargin-sm"></i> {{$degreeDocument->degree_document_name}}</span></a>
                                            <br>
                                        @endif

                                        <div class="input-group input-group-md">


                                            <div class="input-group-btn">

                                                <div class="btn btn-primary">
                                                    <span class="hidden-xs">Télécharger mon diplôme / certifications</span>
                                                    <input
                                                            name="degree_document"
                                                            id="input-8"
                                                            type="file"
                                                            accept=""
                                                            class=""
                                                            data-allowed-file-extensions="[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-10">
                                        <button class="btn btn-success" type="submit">Mettre mon profil à jour</button>
                                    </div>

                                    {!! Form::close() !!}
                                </div>

                            </div>
                        @endif
                    </div>
            </div>
            @include('dates.dates')
            @show

        </div>
    </div>

@endsection