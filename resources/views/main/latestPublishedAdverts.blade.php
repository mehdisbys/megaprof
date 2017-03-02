<div class="col-md-12">
    <h2>Les dernières annonces publiées</h2>
    <div class="carousel">
        @foreach($latestAdverts as $advert)
            @include('main.carouselPreview', ['trimchar' => 350])
        @endforeach
    </div>
</div>