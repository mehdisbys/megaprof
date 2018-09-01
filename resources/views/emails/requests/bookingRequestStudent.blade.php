@extends('emails.master')
@section('content')
    <p>{{$name}}</p>

    <br>

    <p>@lang('requests/bookingRequestStudent.confirm')</p>

    <br>

    <p>@lang('requests/bookingRequestStudent.notify')</p>

    <br>

    <p>@lang('requests/bookingRequestStudent.seeYouSoon')</p>

    <br>

    <p>@lang('requests/bookingRequestStudent.team')</p>
@stop
