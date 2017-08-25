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

<div id="zero_results" class="col-md-8 text-center col-md-offset-3 {{$adverts->total() == 0 ? '' : 'hidden' }} ">
        <div>Malheuresement aucune annonce correspondant à vos critères n'a été trouvée. Entrez votre email ci-dessous pour être informé dès qu'un professeur
                est disponible dans votre ville.
        </div>
        <div class="col-md-12 row student-get-interest">

                <form id="seach_form" action="/student" method="POST">
                        {!! csrf_field() !!}

                        <div class="student-input col-xs-12 col-md-8 ">
                                <input type="email" class="home-search-input" placeholder="Email" name="email" required
                                       data-parsley-required-message="Un email valide est requis." data-parsley-type="email">
                        </div>

                        <input type="hidden" value="{{$selectedSubject or ''}}" name="subject">
                        <input type="hidden" value="{{$subjectId or ''}}" name="subjectId">
                        <input type="hidden" value="{{$selectedCity or ''}}" name="city">
                        <input type="hidden" value="{{$lat or ''}}" name="lat">
                        <input type="hidden" value="{{$lgn or ''}}" name="lng">

                        <div class="student-input-submit-button text-center">
                                <button id="submit-bttn" class="btn btn-info" type="submit">Envoyer</button>
                        </div>

                </form>
        </div>

        <div class="student-presentation well-get-in-touch">Nous vous contacterons dès que des professeurs dans la
                matière de votre choix
                seront disponibles.
        </div>
</div>