<div class="col-md-12">
    <div class="advert-header carousel-preview">

        <div class="single-view-info-author">
            <h3>{{ str_limit($advert->title,100) }}</h3>

            <ul class="icon-list">
                @foreach($advert->subjectsPerAd as $subject)
                    <li>{{\App\Models\SubSubject::find($subject->subject_id)->name}}</li>
                @endforeach

            </ul>
            <ul class="iconlist-info">
                @if($advert->location_city)
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <strong>{{ $advert->location_city }}</strong>

                    </li>
                @endif
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
            <h4><a href="#" class=" center"> {{$advert->price}} Dhs/h</a></h4>
        </div>
        <div id="profile-author" class="single-view-profile-author-profile">
            <div class="single-view-profile-info">
                <div class="single-view-profile-image-wrapper-carousel">
                    <img src="{{ $advert->getAvatar() }}" alt="avatar">
                </div>
                <h3><a href="#" class=" center">{{$advert->user->firstname }}</a></h3>

            </div>
        </div>
    </div>
</div>
