@extends('emails.master')
@section('content')

    <p>{{$name}}</p>

    <br>
    <p>@lang('emails/replies/bookingReplyAccepted.acceptedBooking')</p>
    <br>
    <p>@lang('emails/replies/bookingReplyAccepted.connect')</p>

    <br>

    <p>@lang('emails/replies/bookingReplyAccepted.seeYouSoon')</p>
    <br>

    <p>@lang('emails/replies/bookingReplyAccepted.team')</p>
@stop
