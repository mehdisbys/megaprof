@extends('emails.master')
@section('content')


    <p>{{$user->firstname}}</p>

    <p>
        <a href="{{env('APP_URL') . '/' . $arguments->get('advert')->slug}}">@lang('emails/reminders/remindToAddAvatarIfHasCreatedAnAdvert.youHaveCreated')</a>
    </p>

    <p>@lang('emails/reminders/remindToAddAvatarIfHasCreatedAnAdvert.getMoreBookings')</p>

    <p>@lang('emails/reminders/remindToAddAvatarIfHasCreatedAnAdvert.advertsWithoutAvatar) </p>
    <ul>
        <li>@lang('emails/reminders/remindToAddAvatarIfHasCreatedAnAdvert.willAppearLast')</li>
        <li>@lang('emails/reminders/remindToAddAvatarIfHasCreatedAnAdvert.willGetLessBookings')</li>
    </ul>
    <p>@lang('emails/reminders/remindToAddAvatarIfHasCreatedAnAdvert.adviseToAddPic')</p>

    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/mon-compte"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;" class="button-link">
                        @lang('emails/reminders/remindToAddAvatarIfHasCreatedAnAdvert.addAPic')
                    </span>
                </a>
            </td>
        </tr>
    </table>

    <p><strong>@lang('emails/reminders/remindToAddAvatarIfHasCreatedAnAdvert.makeTheDifference')</strong></p>

    <p>@lang('emails/reminders/remindToAddAvatarIfHasCreatedAnAdvert.team')</p>
@stop
