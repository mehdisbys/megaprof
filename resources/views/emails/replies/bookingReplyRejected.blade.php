@extends('emails.master')
@section('content')

    <p>{{$name}}</p>

    <br>
    <p>@lang('emails/replies/bookingReplyRejected.bookingRejected')</p>
    <br>
    <p>@lang('emails/replies/bookingReplyRejected.connect')</p>

    <br>

    <p>@lang('emails/replies/bookingReplyRejected.seeYouSoon')</p>
    <br>

    <p>@lang('emails/replies/bookingReplyRejected.team')</p>
@stop
