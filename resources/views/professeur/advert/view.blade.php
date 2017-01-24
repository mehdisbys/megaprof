@extends('layouts.master')
@section('content')
    <!-- 1 -->
    <div class="top-container">


        <div class="view-profs-items-container">
            @if(isset($info))
                <h4><span><i class="fa fa-warning"></i> </span>{{$info}}</h4>
            @endif
            <div class="advert-header">

                <div class="single-view-info-author">
                    <h3>{{ $advert->title }}</h3>
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
                        </ul>
                        <h3><a href="#" class=" center"> {{$advert->price}} Dhs/h</a></h3>
                    </div>
                </div>


                <a class="button btn-succes temp-btn-block "
                   href="/mise-en-relation/{{$advert->slug}}">Réserver un cours</a>
            </div>
            <div class="social-icons">
                <a href="http://www.facebook.com/sharer.php?u=http://localhost:8000/{{$advert->slug}}"
                   data-send="false"
                   data-layout="box_count"
                   data-width="60"
                   data-show-faces="false"
                   rel="nofollow"
                   target="_blank"
                   class="social-icon">
                    <i class="fa fa-facebook fa-2x"></i>
                </a>

                <a href="http://twitter.com/share"
                   data-count="vertical"
                   rel="nofollow"
                   target="_blank"
                   class="social-icon si-colored si-twitter">
                    <i class="fa fa-twitter fa-2x"></i>
                </a>

                <a href="#" class="social-icon si-colored si-email3">
                    <i class="fa fa-envelope-o fa-2x"></i>
                </a>
            </div>
            <div class="profile-author-description">

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
                        <div class="view-comment">
                            <strong>{{$comment->sourceUser->firstname}}</strong> :
                            <div>{{$comment->comment}}</div>
                        </div>
                    @endforeach
                @endif
            </div>

        @if(isset($similarAdverts))
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
