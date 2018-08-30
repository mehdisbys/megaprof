@extends('emails.master')
@section('content')


    <p>{{$user->firstname}}</p>

    <p>@lang('reminders/remindToReplyToStudentBooking.goodNews')</p>

    <p>@lang('reminders/remindToReplyToStudentBooking.connectToYourAccount')</p>

    <p>@lang('reminders/remindToReplyToStudentBooking.unlockDetails')</p>


    <p>@lang('reminders/remindToReplyToStudentBooking.ifNotAvailable')</p>


    <p> @lang('reminders/remindToReplyToStudentBooking.autoCancel')</p>

    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/mon-compte"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;"
                          class="button-link">@lang('reminders/remindToReplyToStudentBooking.myAccount')</span>
                </a>
            </td>
        </tr>
    </table>


    <p>@lang('reminders/remindToReplyToStudentBooking.team')</p>
@stop
