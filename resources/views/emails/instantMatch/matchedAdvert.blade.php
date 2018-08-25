@extends('emails.master')
@section('content')

    <p>@lang('instantMatch/matchedAdvert.title')</p>

    <h4><p>@lang('instantMatch/matchedAdvert.subjectTeacher') </p>
        <p>{{$studentInterest->subject}}</p>
        <p>@lang('instantMatch/matchedAdvert.isAvailableAt')</p>
        <p>{{$advert->getLocationText()}}</p></h4>



    <p>@lang('instantMatch/matchedAdvert.youCanSeeAdvert')</p>

    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/{{$advert->slug}}"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;" class="button-link">Voir l'annonce</span>
                </a>
            </td>
        </tr>
    </table>

    <p>@lang('instantMatch/matchedAdvert.learnWLimits')</p>

    <p>@lang('instantMatch/matchedAdvert.team')</p>

    <small>
        <a href="{{env('APP_URL')}}/deactivate-student-alert/{{$studentInterest->token}}">@lang('deactivateAlert')</a>
    </small>
@stop
