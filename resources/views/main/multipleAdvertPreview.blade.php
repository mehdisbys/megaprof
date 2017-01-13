<div class="col-md-12">
    @foreach($adverts as $advert)
        @include('main.advertPreview')
    @endforeach
</div>

<div id="pagination" class="pagination col-md-12">
    @if($adverts->previousPageUrl())
        <a href="#{{$adverts->currentPage() -1}}" class="pagination-link js-id-previous-page"> < Page précèdente</a>
    @endif

    @if($adverts->nextPageUrl())
        <a href="#{{$adverts->currentPage() +1}}" class="pagination-link js-id-next-page">Page suivante > </a>
    @endif
</div>
