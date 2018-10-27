@extends('emails.master')
@section('content')
    <p>@lang('emails/requests/unansweredBookingCancelledStudent.hi', ['studentName' => $studentName])</p>

    <p>@lang('emails/requests/unansweredBookingCancelledStudent.youBooked', ['profName' => $profName])</p>

    <p>@lang('emails/requests/unansweredBookingCancelledStudent.bookingCancelled')</p>

    <p>@lang('emails/requests/unansweredBookingCancelledStudent.pleaseTryAgain')</p>

    <p>@lang('emails/requests/unansweredBookingCancelledStudent.thanks')</p>

    <p>@lang('emails/requests/unansweredBookingCancelledStudent.theTeam')</p>
@stop
