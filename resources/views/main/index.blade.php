@extends('layouts.__master')

@section('content')
    {!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
    {!! HTML::style("js/awesomplete/awesomplete.css") !!}
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::script("js/jquery.geocomplete.min.js") !!}

    <div class="col-md-6 col-md-offset-3">

        {!! Form::open(['url' => '/search']) !!}

        <div class="col-md-8">

            @if($selectedSubject and isset($selectedCity) and !empty($selectedCity))

                <div class="button button-3d button-small button-rounded button-aqua ">{{$selectedSubject}}</div>
                <div class="button button-3d button-small button-rounded button-lime ">à {{$selectedCity}}</div>

            @elseif($selectedSubject)
                {!! Form::hidden('subject', $selectedSubject) !!}
                {!! Form::input('text', 'location', null,
                  [
                    'class' => 'awesomplete sm-form-control',
                    'placeholder' => 'Dans quelle ville souhaitez-vous apprendre ?',
                    'id' => 'location'
                  ])!!}

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
            <div>Malheuresement aucune annonce correspondant à vos critères n'a été trouvée. Réessayez avec d'autres
                options
            </div>
        @else

            @foreach($adverts as $advert)
                @include('main.advertPreview')
                <div class="clear topmargin-sm "></div>
            @endforeach
        @endif

    </div>
    <script>

        $(document).ready(function () {
            $('#location').geocomplete({types: ['(cities)']});
        });

    </script>
@endsection