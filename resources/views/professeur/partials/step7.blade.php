<div>
    <h2 class="col-md-12 center">Publication de l'annonce</h2>

    <div class="col-md-12 center">
        <h5>Félicitations votre annonce est prête à être publiée!</h5>
    </div>

    @include('main.advertPreview', ['urlPreview' => true])

    <div class="clearfix"></div>

    {!! Form::open(['url' => '/nouvelle-annonce-7']) !!}
    {!! Form::hidden('advert_id', $advert->id) !!}

    <div id="validate_buttons" class="col-md-12 text-center topmargin-lg">

        <button type="submit" class="button button-3d button-large button-rounded">
            Publier l'annonce
        </button>
    </div>
    {!! Form::close() !!}

</div>