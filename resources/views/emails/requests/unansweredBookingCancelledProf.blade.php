@extends('emails.master')
@section('content')
    <p>@lang('emails/requests/unansweredBookingCancelledProf.hi', ['name' => $profName])</p>

    <p>@lang('emails/requests/unansweredBookingCancelledProf.youHaveReceivedBooking', ['studentName' => $studentName])</p>

    <p>@lang('emails/requests/unansweredBookingCancelledProf.noAnswer')</p>

    <p>@lang('emails/requests/unansweredBookingCancelledProf.pleaseAnswerNextTime')</p>

    <p>@lang('emails/requests/unansweredBookingCancelledProf.thanks')</p>

    <p>@lang('emails/requests/unansweredBookingCancelledProf.theTeam')</p>
@stop
