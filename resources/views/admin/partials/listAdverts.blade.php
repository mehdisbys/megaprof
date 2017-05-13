@foreach($adverts as $advert)

    <div class="row border1px bottommargin-sm">

        <div class="col-md-2"><a href="/login-as/{{$advert->user_id}}">{{\App\Models\User::find($advert->user_id)->firstname}}</a></div>

        <div class="col-md-4">
            <a href="/{{$advert->slug}}">{{$advert->title}}</a>
        </div>

        <div class="col-md-3">
            Créée : {{$advert->created_at}}
        </div>

        <div class="col-md-3">
            Piéce d'identité : {{ \App\Models\IdDocument::isVerified($advert->user_id) ? 'Validée': 'Pas validée et/ou envoyée' }}
        </div>

    </div>
@endforeach