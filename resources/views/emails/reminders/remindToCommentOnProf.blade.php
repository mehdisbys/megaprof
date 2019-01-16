@extends('emails.master')
@section('content')


    <p>{{$user->firstname}}</p>

    <p>@lang('emails/reminders/remindToCommentOnProf.studentThank')</p>


    <p>@lang('emails/reminders/remindToCommentOnProf.ifLessonHappened', ['name' => $arguments->get('prof')->firstname])</p>

    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/mon-compte"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;"
                          class="button-link">@lang('emails/reminders/remindToCommentOnProf.leaveAComment')</span>
                </a>
            </td>
        </tr>
    </table>

    <p>@lang('emails/reminders/remindToCommentOnProf.visibleComment', ['name' => $arguments->get('prof')->firstname])</p>

    <ol>
        <li>@lang('emails/reminders/remindToCommentOnProf.expertise')</li>
        <li>@lang('emails/reminders/remindToCommentOnProf.listening')</li>
        <li>@lang('emails/reminders/remindToCommentOnProf.pedagogy')</li>
        <li>@lang('emails/reminders/remindToCommentOnProf.punctuality')</li>
        <li>@lang('emails/reminders/remindToCommentOnProf.progress')</li>
    </ol>

    <p><@lang('emails/reminders/remindToCommentOnProf.team')/p>
@stop
