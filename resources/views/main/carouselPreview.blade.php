<div class="col-md-12">
    <div class="advert-header carousel-preview"><div class="col-md-12 author-profile-header">

            <?php
            $prof = \App\Models\User::find($advert->user_id);
            $bookings = \App\Models\Booking::getAcceptedProfBookings($prof);
            ?>

            <div id="profile-author" class="single-view-profile-author-profile">
                <div class="single-view-profile-info">
                    <a href="/{{$advert->slug}}"> <img src="{{ $advert->getAvatar() }}" alt="avatar"></a>
                    <h3><a href="/{{$advert->slug}}" class="center">{{ucfirst(strtolower($advert->user->firstname ))}}</a></h3>
                    <ul class="iconlist-info">
                        {{--@if($advert->can_webcam)--}}
                            {{--<li>--}}
                                {{--<i class="fa fa-skype"></i>--}}
                                {{--<small>Donne des cours par webcam</small>--}}
                            {{--</li>--}}
                        {{--@endif--}}
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
                        @if(isset($bookings) and $bookings->count() > 1)
                            <li>
                                <i class="fa fa-group"></i>
                                <em>@lang('professeur/advert/view.bookedAdverts', ['count' => $bookings->count()]) </em>
                            </li>
                        @endif
                        <li><h3><a href="#" class=" center"> </a></h3></li>
                    </ul>
                </div>
            </div>
            <div class="single-view-info-author">
                <h3 class="single-view-title-carousel"><a href="/{{$advert->slug}}">{{ str_limit(ucfirst($advert->title), 95) }}</a></h3>

                <div class="pull-left">
                    @foreach($advert->subjectsPerAd as $subject)
                        <div class="label label-info">{{ \App\Models\SubSubject::find($subject->subject_id)->name}}</div>
                        <div class="clearfix"></div>
                    @endforeach
                </div>

                <div class="col-md-12 topmargin-sm">
                    {{ str_limit($advert->presentation, 150)}}
                </div>
            </div>
        </div>
    </div>
</div>
