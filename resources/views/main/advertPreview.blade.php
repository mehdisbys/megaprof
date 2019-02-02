<div class="temp-row col-md-12">
    <div class="component-profile-sidebar col-md-2">
        <div class="profile-author-profile">

            <?php
            $prof = \App\Models\User::find($advert->user_id);
            $bookings = \App\Models\Booking::getAcceptedProfBookings($prof);
            ?>

            <a href="/{{$advert->slug}}" class="profile-image-wrapper">

                @if(\App\Models\Avatar::hasAvatar($advert->user_id))
                    <img src="{{ getAvatar($advert->user_id) }}" alt="avatar">
                @else
                    <img alt="avatar" avatar="{{ucfirst($prof->firstname)}}" style="height: 8.2em; width: 8.2em">
                @endif

            </a>
            <h3>
                <a href="/{{$advert->slug}}">
                    {{ $prof->firstname}}
                </a>
            </h3>
            <div>
                <p>
                 <span>
                        <i class="fa fa-map-marker"></i><strong>{{ $advert->location_city }}</strong>
                 </span>
                    @if(isset($distances) and isset($distances[$advert->id]))
                        <i>, à {{ round($distances[$advert->id],1) }} km</i>
                    @endif
                </p>
                @if(isset($bookings) and $bookings->count() > 1)
                    <p>
                 <span>
                        <i class="fa fa-group"></i>
                        <em>@lang('professeur/advert/view.bookedAdverts', ['count' => $bookings->count()]) </em>
                 </span>
                    </p>
                @endif


                <h3 class="info-price">
                    <a href="/{{$advert->slug}}">{{$advert->price}} Dhs/h</a>
                </h3>
            </div>
        </div>
    </div>
    <div class="profile-author-description col-md-6">
        <h4>
            <a href="/{{$advert->slug}}"> {{ $advert->title }}</a>
        </h4>

        <div id="presentation"><a href="/{{$advert->slug}}" class="no-style-url">
                {{ str_limit($advert->presentation, $trimChar ?? 345) }} </a></div>

        <div class="entry-overlay-meta">
            <h4><a href="/{{$advert->slug}}"> Voir l'annonce </a></h4>
        </div>
    </div>
</div>
