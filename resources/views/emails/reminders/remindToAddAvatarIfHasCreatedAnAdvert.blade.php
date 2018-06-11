@extends('emails.master')
@section('content')


    <p>{{$user->firstname}},</p>

    <p>Vous avez récemment créé une <a href="{{env('APP_URL') . '/' . $arguments->get('advert')->slug}}">annonce </a> de cours entre particuliers sur  <a href="https://taelam.com/mon-compte">Taelam.com</a></p>

    <p>Pour multiplier vos chances d'obtenir une réservation <strong>ajoutez une photo à votre profil !</strong></p>

    <p>En effet <strong>les annonces sans photos apparaissent en dernier dans les résultats de recherche </strong> et reçoivent beaucoup moins de réservations, c’est la raison pour laquelle nous vous invitons fortement à compléter votre profil en mettant une photo de vous.</p>

    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="https://taelam.com/mon-compte"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;" class="button-link">Rajouter une photo</span>
                </a>
            </td>
        </tr>
    </table>

   <p><strong>Faites la différence !</strong></p>

    <p>L’Equipe TAELAM </p>
@stop
