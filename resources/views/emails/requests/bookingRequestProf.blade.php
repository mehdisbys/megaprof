@extends('emails.master')
@section('content')

    <h2>@lang('emails/requests/bookingRequestProf.youReceivedBooking', ['name' => $name])</h2>
    <br>

    <p>@lang('emails/requests/bookingRequestProf.studentWantLesson')</p>

    <p>@lang('emails/requests/bookingRequestProf.connect')</p>

    <br>

    <p>@lang('emails/requests/bookingRequestProf.warning')</p>
    <br>
    <p>@lang('emails/requests/bookingRequestProf.seeYouSoon')</p>
    <br>
    <p>@lang('emails/requests/bookingRequestProf.team')</p>
@stop
