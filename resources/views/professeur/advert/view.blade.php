@extends('layouts.master')
@section('content')

@section('title')

    @if($advert->subjectsPerAd->count() == 1)
        <?php $subjects = ucfirst(\App\Models\SubSubject::find($advert->subjectsPerAd->first()->subject_id)->name) ?>
    @elseif($advert->subjectsPerAd->count() > 1)
        <?php $titleSubjects = [] ?>
        @foreach($advert->subjectsPerAd as $subject)
            <?php $titleSubjects[] = ucfirst(\App\Models\SubSubject::find($subject->subject_id)->name); ?>
        @endforeach
        <?php $subjects = implode($titleSubjects, ', ') ?>
    @endif

    <title>Cours particulier de {{$subjects}} à {{$advert->getLocationText()}} avec {{$advert->user->firstname}} |
        Taelam </title>
@endsection()

@section('meta_description')
    <meta name="Description" lang="fr"
          content="Cours particulier de {{$subjects}} à {{$advert->getLocationText()}} : {{str_limit($advert->presentation, 150)}}"/>
@endsection

<!-- 1 -->
<div class="col-md-12">

    <div class="col-md-8 col-md-offset-2">
        @if(isset($info))
            <div class=" alert-info alert toastr-info">
                <h4><span><i class="fa fa-warning"></i> </span>{{$info}}</h4>
            </div>

        @endif

        @if(Auth::user() and Auth::user()->isAdmin() and $advert->published_at != NULL and $advert->approved_at == NULL)
            <div class="col-md-12">
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

        @if(isset($thisIsAPreview) and $thisIsAPreview === true)
            {!! Form::open(['url' => '/nouvelle-annonce-7']) !!}
            {!! Form::hidden('advert_id', $advert->id) !!}

            <div id="validate_buttons" class="col-md-12 text-center topmargin-lg">

                <a href="/modifier-annonce-1/{{$advert->id}}" class="btn btn-info">
                    <i class="fa fa-reply"></i> Éditer l'annonce
                </a>
                <button type="submit" class="button button-3d button-large button-rounded">
                    Publier l'annonce
                </button>
            </div>
            {!! Form::close() !!}
        @endif

        <div class="col-md-12 author-profile-header topmargin-small">
            <div class="single-view-info-author">
                <h1 class="single-view-title">{{ ucfirst($advert->title) }}</h1>

                <div class="pull-left">
                    @foreach($advert->subjectsPerAd as $subject)
                        <div class="label label-info">{{ \App\Models\SubSubject::find($subject->subject_id)->name}}</div>
                        <div class="clearfix"></div>
                    @endforeach
                </div>

                <div class="pull-right">
                    <?php $advertLevels = json_decode(\App\Models\SubjectsPerAdvert::getLevelsPerAdvert($advert->id)[0], true); ?>
                    @if(is_array($advertLevels))
                        @foreach($advertLevels as $level_id)
                            <div class="label label-primary">{{\App\Models\SubLevel::find($level_id)->name}}</div>
                        @endforeach
                    @endif
                </div>

            </div>
            <div id="profile-author" class="single-view-profile-author-profile">
                <div class="single-view-profile-info">
                    <img src="{{ $advert->getAvatar() }}" alt="avatar">
                    <h3><a href="#" class="center">{{ucfirst(strtolower($advert->user->firstname ))}}</a></h3>
                    <ul class="iconlist-info">
                        @if($advert->can_webcam)
                            <li>
                                <i class="fa fa-skype"></i>
                                <small>Donne des cours par webcam</small>
                            </li>
                        @endif
                        @if($advert->can_travel)
                            <li>
                                <i class="fa fa-home"></i>
                                <small>Se déplace à domicile</small>
                            </li>
                        @endif
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <strong>{{ $advert->getLocationText() }}</strong>
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

            <div class="topmargin-small">
                <a class="booking-button temp-btn-block" href="
                    {{ isset($thisIsAPreview) ? '' : '/mise-en-relation/'.$advert->slug}}">Réserver : {{$advert->price}}
                    Dhs/h</a>
                @if($advert->free_first_time != NULL)
                    <div class="first_free_time">1ère heure de cours offerte !</div>
                @endif

            </div>


        </div>
        <div class="col-sm-12 col-sm-offset-0 col-md-12 row center topmargin-small">

            <div class="col-md-8 col-md-offset-2">

                <a href="http://www.facebook.com/sharer.php?u={{env('APP_URL')}}{{$advert->slug}}"
                   data-send="false"
                   data-layout="box_count"
                   data-width="60"
                   data-show-faces="false"
                   rel="nofollow"
                   target="_blank"
                   class="col-md-3">
                    <i class="fa fa-facebook fa-2x"></i>
                </a>

                <a href="http://twitter.com/intent/tweet?text={!! str_limit($advert->title,50,'..') !!}&url={{ urlencode('http://www.taelam.com/' .$advert->slug)  }}&via=taelam_officiel&hashtags=taelam,{{$subjects}}"
                   data-count="vertical"
                   rel="nofollow"
                   target="_blank"
                   class="col-md-3 ">
                    <i class="fa fa-twitter fa-2x"></i>
                </a>

                <a href="mailto:?subject{{$advert->title}}&body={{"J'ai trouvé cette annonce : ". str_limit($advert->presentation, 200)}}"
                   class="col-md-3">
                    <i class="fa fa-envelope-o fa-2x"></i>
                </a>
                <a class="col-md-3" href="whatsapp://send?text=http://www.taelam.com/{{$advert->slug}}"
                   data-action="share/whatsapp/share">
                    <i class="fa fa-whatsapp fa-2x"></i></a>

            </div>
        </div>
        <div class="profile-author-description col-md-12 row">

            <div id="presentation" class="single-advert-text col-md-8 col-md-offset-2">
                <h4 id="experience-title" class="single-advert-title">Description</h4>
                <div id="presentation-text"> {!!  nl2br(e($advert->presentation)) !!}</div>
            </div>

            @if(strlen($advert->content))

                <div id="curriculum" class="single-advert-text col-md-8 col-md-offset-2">
                    <h4 id="curriculum-title" class="single-advert-title">Curriculum Vitae</h4>
                    <div id="curriculum-text"> {!! nl2br(e($advert->content)) !!}</div>
                </div>
            @endif


            @if(strlen($advert->experience))

                <div id="experience" class="single-advert-text col-md-8 col-md-offset-2">
                    <h4 id="experience-title" class="single-advert-title">Expérience</h4>
                    <div id="experience-text"> {!!   nl2br(e($advert->experience)) !!}</div>
                </div>

            @endif
        </div>

        <!-- 2 -->
        <table class="view-table col-md-12 row">
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
        <div class="view-comments col-md-12">

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
            <div class="similar-adverts col-md-12">
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
