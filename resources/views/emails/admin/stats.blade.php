@extends('emails.master')
@section('content')

    <h2>Recherches par matières</h2>
    <br>

    {!! $searchStats->render() !!}

@stop
