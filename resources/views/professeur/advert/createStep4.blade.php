@extends('layouts.master')

@section('content')

    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::style("css/jquery-ui.css") !!}
    {!! HTML::script("js/jquery-ui.js")!!}
    {!! Form::open(['url' => '/nouvelle-annonce-3']) !!}

    <div class="col-md-6 col-md-offset-3">

        <h2>Description et expertise</h2>



    </div>

    {!! Form::close() !!}

@endsection