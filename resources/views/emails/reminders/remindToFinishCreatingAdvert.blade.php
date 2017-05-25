@extends('emails.master')
@section('content')


    <p>{{$user->firstname}},</p>

    <p>Merci de votre intérêt pour <a href="https://taelam.com">taelam.com</a>, nous sommes heureux de vous compter parmi nos professeurs !</p>

    <p>Vous avez commencé à créer une annonce sur Taelam et il ne reste que quelques étapes avant sa publication.</p>

    <p>Finir votre annonce permettra aux élèves de vous contacter et réserver un cours avec vous</p>


    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/mon-compte"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;" class="button-link">Aller sur mon compte Taelam</span>
                </a>
            </td>
        </tr>
    </table>

    <p>N’hésitez pas à répondre à ce mail pour toute information ou aide dans la création de votre annonce.</p>

    <p>L’Equipe TAELAM </p>
@stop
