<div class="temp-row">
  <div  class="component-profile-sidebar">
    <div class="profile-author-profile">
      <a href="/{{$advert->slug}}">
        <img class="avatar" src="{{ getAvatar($advert->user_id) }}" alt="avatar"/>
      </a>
      <h3>
        <a href="/{{$advert->slug}}">
            {{ \App\Models\User::find($advert->user_id)->firstname}}
        </a>
      </h3>
    </div>
  </div>
  <div class="profile-author-description">
    <h2>
      <a href="/{{$advert->slug}}"> {{ $advert->title }}</a>
    </h2>

    <div id="presentation"> {{ str_limit($advert->presentation, $trimChar ?? 345) }}</div>

    <p>
      <strong>{{ $advert->location_city }}</strong>
      @if(isset($distances) and isset($distances[$advert->id]))
      <i>, à {{ round($distances[$advert->id],1) }} km</i>
      @endif
    </p>

    <h3 class="info-price" >
      <a href="/{{$advert->slug}}">{{$advert->price}} Dhs/h</a>
    </h3>

    <div class="entry-overlay-meta">
      <h4>Premier cours offert !</h4>
      <a href="/{{$advert->slug}}"> Voir l'annonce </a>
    </div>
  </div>
</div>
