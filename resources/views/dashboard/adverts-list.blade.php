@if(isset($adverts))
    @foreach($adverts as $advert)

        <div class="col-md-6 clearfix bottommargin-sm border1px" data-readmore
             aria-expanded="false">
            <div class="col-md-6 clearfix">
                <div class="bold">{{ $advert->title == '' ? 'Brouillon - (Annonce sans titre)' : $advert->title}}</div>

                <div class="col-md-12 topmargin-sm">
                    @foreach($advert->subjectsPerAd as $subject)
                        <div class="btn btn-default btn-xs">{{\App\Models\SubSubject::find($subject->subject_id)->name}}</div>
                        <div class="clearfix"></div>
                    @endforeach
                </div>

                <div class="pull-right topmargin-sm">
                    <i class="icon-location"></i><strong>{{ $advert->location_city }}</strong>
                </div>

                <div class="col-md-12">{{$advert->updated_at->format('d/m/Y H:i') }}</div>
            </div>
        </div>
        <div class="col-md-2">

            @if($advert->published_at != null)
                <div class="button button-small button-red button-rounded">
                    <a href="/desactiver-annonce/{{$advert->id}}/">Désactiver</a>
                </div>
            @else
                <div class="button button-small button-lime button-rounded">
                    <a href="/activer-annonce/{{$advert->id}}/">Activer</a>
                </div>
                <div class="button button-small button-lime button-rounded">
                    <a class='delete-advert' href="/supprimer-annonce/{{$advert->id}}/">Supprimer</a>
                </div>

            @endif

            <div class="button button-small button-leaf button-rounded">
                <a href="/{{$advert->slug}}">Voir</a>
            </div>
            <div class="button button-yellow button-rounded">
                <a href="/modifier-annonce-1/{{$advert->id}}">Modifier</a>
            </div>
        </div>
        <div class="clearfix"></div>
    @endforeach
@endif