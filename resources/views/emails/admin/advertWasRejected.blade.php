@extends('emails.master')
@section('content')

    <p>{{$name }}</p>

    <br>
    <p>@lang('emails/admin/advertWasRejected.thankInterest')</p>
    <br>
    <p>@lang('emails/admin/advertWasRejected.advert')</p>
    <p>{{$advert->title}}</p>
    <p>@lang('emails/admin/advertWasRejected.moderatedAdvert')</p>
    <br>

    <p>@lang('emails/admin/advertWasRejected.cantPublish') </p>

    <p>{{$messageAdmin}}</p>



    <p>
        <a href="https://www.taelam.com/mon-compte">@lang('emails/admin/advertWasRejected.connect')</a>@lang('emails/admin/advertWasRejected.modifyYourAdvert')
    </p>

    <br>

    <p><a href="https://www.taelam.com">@lang('emails/admin/advertWasRejected.seeYou')</a></p>
    <br>

    <p>@lang('emails/admin/advertWasRejected.fromTheTeam')</p>
@stop
