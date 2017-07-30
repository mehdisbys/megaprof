<div class="col-md-12">
    <div class="advert-header carousel-preview"><div class="col-md-12 author-profile-header">

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
            <div class="single-view-info-author">
                <h1 class="single-view-title"><a href="/{{$advert->slug}}">{{ str_limit(ucfirst($advert->title), 75) }}</a></h1>

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

                <div class="col-md-12 topmargin-sm">
                    {{ str_limit($advert->presentation, 150)}}
                </div>
            </div>
        </div>
    </div>
</div>
