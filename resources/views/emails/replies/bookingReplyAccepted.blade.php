@extends('emails.master')
@section('content')

    <p>{{$name}}</p>

    <br>
    <p>@lang('replies/bookingReplyAccepted.acceptedBooking')</p>
    <br>
    <p>@lang('replies/bookingReplyAccepted.connect')</p>

    <br>

    <p>@lang('replies/bookingReplyAccepted.seeYouSoon')</p>
    <br>

    <p>@lang('replies/bookingReplyAccepted.team')</p>
@stop
