<div>
    <h2 class="col-md-12 center">Publication de l'annonce</h2>

    <div class="col-md-12 center">
        <h5>Félicitations votre annonce est prête à être publiée!</h5>
    </div>

    @include('main.advertPreview', ['urlPreview' => true])


    {!! Form::open(['url' => '/nouvelle-annonce-7']) !!}
    {!! Form::hidden('advert_id', $advert->id) !!}

    <div id="validate_buttons" class="col-md-12 text-center">
        <a href="/modifier-annonce-1/{{$advert->id}}" class="btn btn-info">
            <i class="fa fa-reply"></i> Éditer l'annonce
        </a>
        <button type="submit" class="button button-3d button-large button-rounded">
            Publier l'annonce
        </button>
    </div>
    {!! Form::close() !!}

</div>