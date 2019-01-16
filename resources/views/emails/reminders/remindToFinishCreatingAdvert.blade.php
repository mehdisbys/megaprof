@extends('emails.master')
@section('content')


    <p>{{$user->firstname}}</p>

    <p>@lang('emails/reminders/remindToFinishCreatingAdvert.thankMember')</p>

    <p>@lang('emails/reminders/remindToFinishCreatingAdvert.youStartedAd')</p>

    <p>@lang('emails/reminders/remindToFinishCreatingAdvert.finishAd')</p>


    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/mon-compte"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;"
                          class="button-link">@lang('emails/reminders/remindToFinishCreatingAdvert.goToAccount')</span>
                </a>
            </td>
        </tr>
    </table>

    <p>@lang('emails/reminders/remindToFinishCreatingAdvert.weCanHelp')</p>

    <p>@lang('emails/reminders/remindToFinishCreatingAdvert.team')</p>
@stop
