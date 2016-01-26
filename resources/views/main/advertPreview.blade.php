<div class="row border1px">

    <div class="">
        <div id="author" class="col-md-3">
            <div id="leftside">
                <img src="{{ $advert->getAvatar() }}" alt="">

                <h3><a href="#" class=" center">{{$advert->user->firstname }}</a></h3>
            </div>
        </div>

        <div class="col-md-6">
            <h5>{{ $advert->title }}</h5>
            <div id="presentation"> {{ str_limit($advert->presentation, 345) }}</div>
            <div class="pull-right">
                <i class="icon-location"></i> Habite à <strong>{{ $advert->location_city }}</strong>
            </div>

        </div>

        <div class="col-md-3">
            <div id="rightside">

                <div id="info-price">
                    <div class="entry-overlay-meta">
                        <h3><a href="#" class=" center"> {{$advert->price}} Dhs/h</a></h3>

                        <h4>Premier cours offert !</h4>
                        <a href="/{{$advert->slug}}">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-danger btn-block btn-md">Voir l'annonce
                                </button>
                            </div>
                        </a>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>