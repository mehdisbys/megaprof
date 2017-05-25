@extends('emails.master')
@section('content')


    <p>{{$user->firstname}},</p>

    <p>Merci de votre intérêt pour <a href="https://taelam.com">taelam.com</a>, nous sommes heureux de vous compter parmi nos professeurs !</p>


    <p>Afin de permettre aux élèves de bénéficier de vos compétences et d’en être rémunéré, nous vous invitons à créer vos annonces dans les activités de votre choix.</p>


    <p>Partager sa passion ou ses compétences et être rémunéré c'est facile avec Taelam !</p>

    <ol>
        <li> Postez votre annonce</li>
        <li> Recevez les demandes des élèves</li>
        <li> Faites votre cours et soyez rémunéré</li>
    </ol>


    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/inscription"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;" class="button-link">Je crée mon annonce en moins de 10 minutes</span>
                </a>
            </td>
        </tr>
    </table>

        <p>N’hésitez pas à répondre à ce mail pour toute information ou aide dans la création de votre annonce.</p>

    <p>L’Equipe TAELAM </p>
@stop
