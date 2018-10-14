<div>
    <h2 class="col-md-12 center">@lang('professeur./artials./tep7.advertPublication')</h2>

    @include('main.advertPreview', ['urlPreview' => true])


    {!! Form::open(['url' => '/nouvelle-annonce-7']) !!}
    {!! Form::hidden('advert_id', $advert->id) !!}

    <div id="validate_buttons" class="col-md-12 text-center">
        <a href="/modifier-annonce-1/{{$advert->id}}" class="btn btn-info">
            <i class="fa fa-reply"></i> @lang('professeur./artials./tep7.editAdvert')
        </a>
        <button type="submit" class="button button-3d button-large button-rounded">
            @lang('professeur/partials/step7.publishAdvert')
        </button>
    </div>
    {!! Form::close() !!}

</div>