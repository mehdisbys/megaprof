<div class="row clearfix">

  <div  class="component-profile-sidebar">
    <div class="profile-author-profile">
      <h3><a href="/{{$advert->slug}}">{{ \App\Models\User::find($advert->user_id)->firstname}}</a></h3>
      <a href="/{{$advert->slug}}"><img src="{{ getAvatar($advert->user_id) }}" alt=""/></a>
    </div>
  </div>


  <div class="profile-author-description">
    <h5><a href="/{{$advert->slug}}"> {{ $advert->title }}</a></h5>

    <div id="presentation"> {{ str_limit($advert->presentation, 345) }}</div>
    <p>
      <i class=""></i><strong>{{ $advert->location_city }}</strong>
      @if(isset($distances) and isset($distances[$advert->id]))
      <i>, à {{ round($distances[$advert->id],1) }} km</i>
      @endif
    </p>
    <h3 class="info-price" ><a href="/{{$advert->slug}}">{{$advert->price}} Dhs/h</a></h3>
    <div class="entry-overlay-meta">
      <h4>Premier cours offert !</h4>
      <a href="/{{$advert->slug}}"> Voir l'annonce </a>
    </div>
  </div>
</div>
