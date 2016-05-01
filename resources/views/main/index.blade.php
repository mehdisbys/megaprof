@extends('layouts.__master')

@section('content')
    {!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
    {!! HTML::style("js/awesomplete/awesomplete.css") !!}
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::script("js/jquery.geocomplete.min.js") !!}
    {!! HTML::script("js/jquery.form.min.js") !!}

    <div class="col-md-6 col-md-offset-3">

        {!! Form::open(['url' => '/search', 'id' => 'search_form']) !!}

        <div class="col-md-8">

            @if($selectedSubject and isset($selectedCity) and !empty($selectedCity))
                {!! Form::hidden('subject', $selectedSubject) !!}

                <div class="button button-3d button-small button-rounded button-aqua ">{{$selectedSubject}}</div>
                <div class="button button-3d button-small button-rounded button-lime ">à {{$selectedCity}}</div>
                <div class="button button-3d button-small button-rounded button-blue ">dans un rayon de {{$radius}} km</div>


            @elseif($selectedSubject)
                {!! Form::hidden('subject', $selectedSubject) !!}
                <div class="location-details no-visibility">
                    {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
                    {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
                </div>
                {!! Form::input('text', 'location', null,
                  [
                    'class' => 'awesomplete sm-form-control',
                    'placeholder' => 'Dans quelle ville souhaitez-vous apprendre ?',
                    'id' => 'location'
                  ])!!}

                <div class="clearfix"></div>
                <label class="search-radio radio">
                    <input name="radius" value="1" type="radio">
                    Dans un rayon de 5 km
                </label>
                <label class="search-radio radio">
                    <input name="radius" value="2" type="radio">
                    Dans un rayon de 10 km
                </label>
                <label class="search-radio radio">
                    <input name="radius" value="3" type="radio">
                    Dans un rayon de 20 km
                </label>
                <label class="search-radio radio">
                    <input name="radius" value="4" type="radio">
                    Uniquement à domicile
                </label>

                <div class="clearfix topmargin-sm"></div>
                <div class="button button-3d button-small button-rounded button-aqua ">{{$selectedSubject}}</div>

            @else
                {!! Form::input('text', 'subject', $selectedSubject,
                [
                'class' => 'awesomplete sm-form-control',
                'placeholder' => 'Que souhaitez-vous apprendre ?',
                'data-minchars' => 1,
                'data-autofirst' => true,
                'data-list' => $subsubjects,
                'style' => 'width:100%;'
                ]) !!}
            @endif

        </div>

        @if(isset ($selectedCity) and !empty($selectedCity))
            <div class="clearfix"></div>
            <div class="col-md-3 pull-right">
                <a class="button button-3d button-small button-rounded button-amber pull-right" href="/">
                    Nouvelle recherche
                </a>
            </div>
        @else
            <div class="col-md-3">
                <button type="submit" class="button button-3d button-small button-rounded button-green pull-right">
                    Chercher
                </button>
            </div>
        @endif
        {!! Form::close() !!}
    </div>

    <div class="col-md-10 col-md-offset-1 topmargin-lg">

        @if(count($adverts) == 0)
            <div>Malheuresement aucune annonce correspondant à vos critères n'a été trouvée. Réessayez avec d'autres options</div>
        @else
            <div class="topmargin-sm bottommargin-sm">{{count($adverts)}} professeurs correspondent à vos critères.</div>
            @include('main.multipleAdvertPreview')
        @endif

    </div>
    <script>

        $(document).ready(function () {

          //  $('#search_form').ajaxForm(function() {});

            $('#location').geocomplete(
                    {
                        types: ['(cities)'],
                        details: ".location-details",
                    });
        });

    </script>
@endsection