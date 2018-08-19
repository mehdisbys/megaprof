@extends('emails.master')
@section('content')


    <p>{{$name }}</p>

    <br>

    <p>@lang('emails/comment/studentCommented.studentCommentedOnYou')</p>

    <br>

    <p><a href="http://www.taelam.com/mon-compte">
            @lang('emails/comment/studentCommented.loginToSeeComment')</a></p>
    <br>

    <p>
        <a href="http://www.taelam.com">@lang('emails/comment/studentCommented.seeYouSoon')</a></p>
    <br>

    <p>@lang('emails/comment/studentCommented.team')</p>
@stop
