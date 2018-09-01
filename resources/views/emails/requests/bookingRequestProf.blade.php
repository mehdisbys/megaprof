@extends('emails.master')
@section('content')

    <h2>@lang('requests/bookingRequestProf.youReceivedBooking', ['name' => $name])</h2>
    <br>

    <p>@lang('requests/bookingRequestProf.studentWantLesson')</p>

    <p>@lang('requests/bookingRequestProf.connect')</p>

    <br>

    <p>@lang('requests/bookingRequestProf.warning')</p>
    <br>
    <p>@lang('requests/bookingRequestProf.seeYouSoon')</p>
    <br>
    <p>@lang('requests/bookingRequestProf.team')</p>
@stop
