@extends('emails.master')
@section('content')


    <p>{{$user->firstname}},</p>

    <p>Merci de votre intérêt pour Taelam, nous sommes heureux de vous compter parmi nos élèves !</p>


    <p>Si le cours avec votre professeur {{$arguments->get('prof')->firstname}} à déjà eu lieu nous vous invitons à lui laisser un commentaire.</p>

    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/mon-compte"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;" class="button-link">Laisser un commentaire</span>
                </a>
            </td>
        </tr>
    </table>

    <p>Ce commentaire sera visible des autres élèves et permet de partager ce que vous avez pensé de {{$arguments->get('prof')->firstname}} sur les points suivants :</p>

    <ol>
        <li>L'expertise</li>
        <li>Le sens de l'écoute</li>
        <li>La pédagogie</li>
        <li>La ponctualité</li>
        <li>Les résultats obtenus</li>
    </ol>


    <p>N’hésitez pas à répondre à ce mail pour toute information ou aide dans la création de votre annonce.</p>

    <p>L’Equipe TAELAM </p>
@stop
