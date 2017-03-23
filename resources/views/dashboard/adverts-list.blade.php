@if(isset($adverts))
    @foreach($adverts as $advert)

        <div class="col-md-8 clearfix bottommargin-sm border1px">
            <div>

                @if($advert->title == '')
                    <div class="bold col-md-12"><span class="fa fa-warning"></span> Brouillon - (Annonce sans titre)
                    </div>
                @else
                    <div class="bold col-md-12">{{$advert->title}}</div>
                @endif

                <div class="col-md-12 topmargin-sm">
                    @foreach($advert->subjectsPerAd as $subject)
                        <div class="label label-info">{{\App\Models\SubSubject::find($subject->subject_id)->name}}</div>
                        <div class="clearfix"></div>
                    @endforeach
                </div>

                <div class="col-md-12 topmargin-sm bottommargin-sm">
                    <div class="col-md-4">
                        <i class="fa fa-map-marker"></i><strong> {{ $advert->location_city ?? 'Non renseigné' }}</strong>
                    </div>

                    <div class="col-md-8 pull-right">
                        <small>Dernière modification: {{$advert->updated_at->format('d/m/Y H:i') }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">

            @if($advert->published_at != null)
                <div class="btn btn-warning ">
                    <a href="/desactiver-annonce/{{$advert->id}}/">Désactiver</a>
                </div>
            @else
                <div class="btn btn-success">
                    <a href="/activer-annonce/{{$advert->id}}/">Activer</a>
                </div>
                <div class="btn btn-danger topmargin-xsm">
                    <a class='delete-advert' href="/supprimer-annonce/{{$advert->id}}/">Supprimer</a>
                </div>

            @endif

            <div class="btn btn-info topmargin-xsm">
                <a href="/{{$advert->slug}}">Voir</a>
            </div>
            <div class="btn btn-primary topmargin-xsm">
                <a href="/modifier-annonce-1/{{$advert->id}}">Modifier</a>
            </div>
        </div>
        <div class="clearfix"></div>
    @endforeach
@endif