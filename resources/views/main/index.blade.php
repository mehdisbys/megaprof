@extends('layouts.__master')

@section('content')
    {!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
    {!! HTML::style("js/awesomplete/awesomplete.css") !!}
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::script("js/jquery.geocomplete.min.js") !!}
    {!! HTML::script("js/jquery.form.min.js") !!}

    <div class="col-md-10 col-md-offset-3">

        {!! Form::open(['url' => '/search', 'id' => 'search_form']) !!}

        <div class="col-md-8">

            {!! Form::input('text', 'subject', $selectedSubject,
            [
            'class' => 'awesomplete sm-form-control',
            'placeholder' => 'Que souhaitez-vous apprendre ?',
            'data-minchars' => 1,
            'data-autofirst' => true,
            'data-list' => $subsubjects,
            'style' => 'width:100%;',
            'id' => 'subject_input'
            ]) !!}

            {!! Form::input('text', 'location', null,
                [
                  'class' => 'awesomplete sm-form-control no-visibility',
                  'placeholder' => 'Dans quelle ville souhaitez-vous apprendre ?',
                  'id' => 'location'
                ])!!}

            <div id="radius_input" class="no-visibility">
                <label class="search-radio">
                    <input name="radius" value="1" type="radio">
                   5 km
                </label>
                <label class="search-radio">
                    <input name="radius" value="2" type="radio">
                   10 km
                </label>
                <label class="search-radio">
                    <input name="radius" value="3" type="radio">
                   20 km
                </label>
                <label class="search-radio">
                    <input name="radius" value="4" type="radio">
                    Uniquement à domicile
                </label>
            </div>

                <span><button type="submit" class="button button-3d button-small button-rounded button-green pull-right">
                    <span class="icon-search3"></span>
                </button></span>

            <div class="location-details no-visibility">
                {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
                {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
            </div>

            <div id="subject" class="button button-3d button-small button-rounded button-aqua no-visibility"></div>
            <div id="city" class="button button-3d button-small button-rounded button-yellow no-visibility"></div>
            <div id="radius" class="button button-3d button-small button-rounded button-amber no-visibility"></div>

        </div>

        {!! Form::close() !!}
    </div>

    <div class="col-md-10 col-md-offset-1 topmargin-lg">

        @if(count($adverts) == 0)
            <div>Malheuresement aucune annonce correspondant à vos critères n'a été trouvée. Réessayez avec d'autres options</div>
        @else

            <div id="count_results" class="topmargin-sm bottommargin-sm"><span id="count_value"></span><span id="count_text"> professeurs correspondent à vos critères.</span> </div>

            <div id="search_results">
                @include('main.multipleAdvertPreview')
            </div>
        @endif

    </div>
    <script>

        $(document).ready(function () {

            $('#search_form').ajaxForm(updatePage);

            function updatePage(data)
            {
                $("#count_value").html(data.count);
                $("#search_results").html(data.results);

                updateForm(data);
            }

            function updateForm(data)
            {
                if(data.params.selectedSubject)
                {
                    $("#subject").removeClass('no-visibility').html(data.params.selectedSubject);
                    $("#subject_input").addClass('no-visibility');
                    $("#location").removeClass('no-visibility');
                }

                if(data.params.city)
                {
                    $("#city").removeClass('no-visibility').html(data.params.city);
                    $("#location").addClass('no-visibility');
                    $("#radius_input").removeClass('no-visibility');
                }

                if(data.params.selectedRadius)
                {
                    $("#radius").removeClass('no-visibility').html(data.params.selectedRadius);
                    $("#radius_input").addClass('no-visibility');
                }
            }

            $('#location').geocomplete(
                    {
                        types: ['(cities)'],
                        details: ".location-details",
                    });
        });

    </script>
@endsection