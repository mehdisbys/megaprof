@foreach($adverts as $advert)
    @include('main.advertPreview')
@endforeach

<div id="pagination" class="pagination">
    @if($adverts->previousPageUrl())
        <a href="#{{$adverts->currentPage() -1}}" class="pagination-link js-id-previous-page">Page précèdente</a>
    @endif

    @if($adverts->nextPageUrl())
        <a href="#{{$adverts->currentPage() +1}}" class="pagination-link js-id-next-page">Page suivante</a>
    @endif
</div>
