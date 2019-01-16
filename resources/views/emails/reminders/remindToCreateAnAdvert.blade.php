@extends('emails.master')
@section('content')


    <p>{{$user->firstname}}</p>

    <p>@lang('emails/reminders/remindToCreateAnAdvert.thankMember')</p>


    <p>@lang('emails/reminders/remindToCreateAnAdvert.createAdvert')</p>


    <p>@lang('emails/reminders/remindToCreateAnAdvert.sharePassion')</p>

    <ol>
        <li>@lang('emails/reminders/remindToCreateAnAdvert.postAd')</li>
        <li>@lang('emails/reminders/remindToCreateAnAdvert.receiveBookings')</li>
        <li>@lang('emails/reminders/remindToCreateAnAdvert.getPaid')</li>
    </ol>


    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/inscription"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;"
                          class="button-link">@lang('emails/reminders/remindToCreateAnAdvert.createAdvertIn10')</span>
                </a>
            </td>
        </tr>
    </table>

    <p>@lang('emails/reminders/remindToCreateAnAdvert.weCanHelp')</p>

    <p>@lang('emails/reminders/remindToCreateAnAdvert.team')</p>
@stop
