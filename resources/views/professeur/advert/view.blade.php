@extends('layouts.master')
@section('content')
    <!-- 1 -->
    <div class="top-container">

        <div class="view-profs-items-container">
            @if(isset($info))
                <h4><span><i class="fa fa-warning"></i> </span>{{$info}}</h4>
            @endif

            @if(Auth::user() and Auth::user()->isAdmin() and $advert->published_at != NULL and $advert->approved_at == NULL)
                <div class="advert-header">
                    <form action="/rejeter-annonce/{{$advert->id}}" method="post">

                        {{csrf_field()}}

                        <a href="/annonces-en-attente-de-moderation"> < Retour aux annonces à valider</a>

                        <h4><i class="fa fa-info-circle"></i> Annonce en attente de validation</h4>
                        <i>Cet encadré n'est visible que des administrateurs. Le motif de rejet sera envoyé par e-mail
                            au professeur.</i>
                        <div class="">
                            Motif de rejet :
                            <p>
                                <textarea cols="75" rows="8" name="message"></textarea>
                            </p>
                        </div>

                        <div class="">

                            <a class="button-green btn btn-success pull-right"
                               href="/validate-advert/{{$advert->id}}">Valider l'annonce</a>
                        </div>

                        <div class="col-md2 ">

                            <button class="button-red btn btn-danger" type="submit"
                                    href="/reject-advert/{{$advert->id}}">Refuser
                            </button>
                        </div>

                    </form>
                </div>

            @endif
            <div class="advert-header">


                <div class="single-view-info-author">
                    <h3>{{ $advert->title }}</h3>

                    <div class="pull-left">
                        @foreach($advert->subjectsPerAd as $subject)
                            <div class="label label-info">{{\App\Models\SubSubject::find($subject->subject_id)->name}}</div>
                            <div class="clearfix"></div>
                        @endforeach
                    </div>

                    <div class="pull-right">
                        @foreach(json_decode(\App\Models\SubjectsPerAdvert::getLevelsPerAdvert($advert->id)[0],true) as $level_id)
                            <div class="label label-primary">{{\App\Models\SubLevel::find($level_id)->name}}</div>
                        @endforeach
                    </div>

                </div>
                <div id="profile-author" class="single-view-profile-author-profile">
                    <div class="single-view-profile-info">
                        <div class="single-view-profile-image-wrapper">
                            <img src="{{ $advert->getAvatar() }}" alt="avatar">
                        </div>
                        <h3><a href="#" class=" center">{{$advert->user->firstname }}</a></h3>
                        <ul class="iconlist-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <strong>{{ $advert->location_city }}</strong>
                            </li>
                            @if(isset($ratings))
                                <li>
                                    <i class="fa fa-star"></i>
                                    <strong>Noté {{ $ratings->ratings_average}}/5</strong>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i>
                                    <strong>{{ $ratings->ratings_count}} avis d'élèves</strong>
                                </li>
                            @endif
                            <li><h3><a href="#" class=" center"> </a></h3></li>
                        </ul>
                    </div>
                </div>

                <div>
                    <a class="booking-button temp-btn-block "
                       href="/mise-en-relation/{{$advert->slug}}">Réserver un cours : {{$advert->price}} Dhs/h</a>
                </div>



            </div>
            <div class="col-md-12 row col-md-offset-3 social-icons">
                <a href="http://www.facebook.com/sharer.php?u={{env('APP_URL')}}{{$advert->slug}}"
                   data-send="false"
                   data-layout="box_count"
                   data-width="60"
                   data-show-faces="false"
                   rel="nofollow"
                   target="_blank"
                   class="col-md-3 si-colored si-facebook">
                    <i class="fa fa-facebook fa-2x"></i>
                </a>

                <a href="http://twitter.com/share"
                   data-count="vertical"
                   rel="nofollow"
                   target="_blank"
                   class="col-md-3 si-colored si-twitter">
                    <i class="fa fa-twitter fa-2x"></i>
                </a>

                <a href="#" class="col-md-3 si-colored si-email3">
                    <i class="fa fa-envelope-o fa-2x"></i>
                </a>
            </div>
            <div class="profile-author-description col-md-12 row">

                <div id="presentation" class="single-advert-text">
                    <h4 id="experience-title" class="single-advert-title">Description</h4>
                    <div id="presentation-text"> {{ $advert->presentation  }}</div>
                </div>

                <div id="experience" class="single-advert-text">
                    <h4 id="experience-title" class="single-advert-title">Expérience</h4>
                    <div id="experience-text"> {{ $advert->experience }}</div>
                </div>

                <div id="curriculum" class="single-advert-text">
                    <h4 id="curriculum-title" class="single-advert-title">Curriculum Vitae</h4>
                    <div id="curriculum-text"> {{ $advert->content }}</div>
                </div>

            </div>

            <!-- 2 -->
            <table class="view-table">
                <thead>
                <tr>
                    <th></th>
                    <th>Chez {{$advert->user->firstname}}</th>
                    <th>À domicile</th>
                    <th>Par webcam</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1 heure</td>
                    <td>{{$advert->price}}Dh</td>
                    <td>{{$advert->price_travel}}Dh</td>
                    <td>{{$advert->price * ((100 - $advert->price_webcam_percentage)/100)}}Dh</td>
                </tr>
                <tr>
                    <td>5 heures</td>
                    <td>{{$advert->price_5_hours}}Dh</td>
                    <td>{{$advert->price_5_hours + $advert->price_travel}}Dh</td>
                    <td>{{$advert->price_5_hours * ((100 - $advert->price_webcam_percentage)/100)}}Dh</td>
                </tr>
                <tr>
                    <td>10 heures</td>
                    <td>{{$advert->price_10_hours}}Dh</td>
                    <td>{{$advert->price_10_hours + $advert->price_travel}}Dh</td>
                    <td>{{$advert->price_10_hours * ((100 - $advert->price_webcam_percentage)/100)}}Dh</td>
                </tr>
                </tbody>
            </table>


            <!-- 3 -->
            <div class="view-comments">

                @if(isset($comments) and $comments->count())
                    <h3>Avis des étudiants</h3>
                    @foreach($comments as $comment)
                        <div class="single-advert-text">
                            <strong>{{$comment->sourceUser->firstname}}</strong> :
                            <div>{{$comment->comment}}</div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if(isset($similarAdverts) and count($similarAdverts) > 0)
                <div class="similar-adverts">
                    <div class="similar-adverts-wrapper">
                        <h3>Les professeurs similaires</h3>

                        @foreach($similarAdverts as $advert)
                            <div class="similar-advert">

                                <div class="avatar-wrapper"><a href="/{{$advert->slug}}">
                                        <img class="avatar" src="{{ getAvatar($advert->user_id) }}" alt=""/>
                                    </a>
                                    <h5><a href="#" class=""> {{$advert->price}} Dhs/h</a></h5>
                                </div>

                                <h4 class="firstname"><a
                                            href="/{{$advert->slug}}">{{ \App\Models\User::find($advert->user_id)->firstname}}</a>
                                </h4>

                                <div class="location">
                                    <i class="fa fa-map-marker"></i> {{ $advert->location_city }}
                                </div>

                                <h5><a href="/{{$advert->slug}}"> {{ $advert->title }}</a></h5>

                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
