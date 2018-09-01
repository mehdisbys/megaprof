@extends('emails.master')
@section('content')

    <p>{{$name}}</p>

    <br>
    <p>@lang('replies/bookingReplyRejected.bookingRejected')</p>
    <br>
    <p>@lang('replies/bookingReplyRejected.connect')</p>

    <br>

    <p>@lang('replies/bookingReplyRejected.seeYouSoon')</p>
    <br>

    <p>@lang('replies/bookingReplyRejected.team')</p>
@stop
