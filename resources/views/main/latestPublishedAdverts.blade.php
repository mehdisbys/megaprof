<div class="col-md-12">
    <h3 class="text-center mini-padding-top">{{$title}}</h3>
    <div class="carousel col-md-8 col-md-offset-2">
        @foreach($carouselAdverts as $advert)
            @include('main.carouselPreview', ['trimchar' => 350])
        @endforeach
    </div>
</div>