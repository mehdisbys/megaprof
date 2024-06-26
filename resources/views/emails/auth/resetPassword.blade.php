@extends('emails.master')
@section('content')

    <h1>@lang('emails/auth/resetPassword.title')</h1>
    <br>

    <p> @lang('emails/auth/resetPassword.youAskedReset')</p>

    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="{{$link or ''}}"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;"
                          class="button-link">@lang('emails/auth/resetPassword.resetButton')</span>
                </a>
            </td>
        </tr>
    </table>

    <p>@lang('emails/auth/resetPassword.afterText')</p>

    <p>@lang('emails/auth/resetPassword.ignore')</p>
    <br>

    <p>
        <a href="http://www.taelam.com">@lang('emails/auth/resetPassword.seeYouSoon')</a></p>
    <br>

    <p>@lang('emails/auth/resetPassword.team')</p>

@stop
