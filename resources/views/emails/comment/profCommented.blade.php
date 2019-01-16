@extends('emails.master')
@section('content')

    <p>{{$name }}</p>

    <br>

    <p>@lang('emails/comment/profCommented.profCommentedOnYou')</p>

    <br>

    <p><a href="http://www.taelam.com/mon-compte">
            @lang('emails/comment/profCommented.loginToSeeComment')</a></p>

    <br>

    <p>
        <a href="http://www.taelam.com">@lang('emails/comment/profCommented.seeYouSoon')</a></p>
    <br>

    <p>@lang('emails/comment/profCommented.team')</p>

@stop

