@extends('emails.master')
@section('content')
    <p>{{$name}}</p>

    <br>

    <p>@lang('emails/requests/bookingRequestStudent.confirm')</p>

    <br>

    <p>@lang('emails/requests/bookingRequestStudent.notify')</p>

    <br>

    <p>@lang('emails/requests/bookingRequestStudent.seeYouSoon')</p>

    <br>

    <p>@lang('emails/requests/bookingRequestStudent.team')</p>
@stop
