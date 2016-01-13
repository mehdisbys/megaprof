@extends('layouts.master')

@section('content')

    <div class="col-md-6 col-md-offset-3">

        {!! Form::open(['url' => '/search']) !!}

        <div class="col-md-8">

            {!! Form::input('text', 'search', null, ['class' => 'sm-form-control', 'placeholder' => 'Que souhaitez-vous apprendre ?']) !!}
        </div>

        <div class="col-md-3">
            <button type="submit" class="button button-3d button-small button-rounded button-green pull-right">
                Chercher
            </button>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-md-10 col-md-offset-1 topmargin-sm">

        @foreach($adverts as $advert)

            @include('main.advertPreview')
            <div class="clear topmargin-sm "></div>

        @endforeach

    </div>

@endsection