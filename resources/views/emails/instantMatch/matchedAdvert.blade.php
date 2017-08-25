@extends('emails.master')
@section('content')


<h4>Un professeur de {{$studentInterest->subject}} est disponible à {{$advert->getLocationText()}} ! </h4>

    <p>Vous nous avez demandé de vous informer dès qu'un professeur de {{$studentInterest->subject}} serait disponible près de chez vous</p>


    <p>Vous pouvez dès à présent voir l'annonce du professeur en ligne :</p>

    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/{{$advert->slug}}"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;" class="button-link">Voir l'annonce de {{$studentInterest->subject}}</span>
                </a>
            </td>
        </tr>
    </table>

    <p>Apprenez Sans Limites !</p>

    <p>L’Equipe TAELAM </p>

    <small><a href="https://taelam.com/deactivate-student-alert/{{$studentInterest->id}}">Se désabonner de cette alerte</a></small>
@stop
