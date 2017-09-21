@extends('emails.master')
@section('content')


    <p>{{$user->firstname}},</p>

    <p>Vous avez reçu une réservation d'annonce hier, il vous reste un jour pour répondre !</p>

    <p> <strong>A titre d'information : toute réservation qui n'aura pas reçu de réponse sous 48h sera automatiquement annulée et vous n'aurez pas la possibilité de contacter l'élève.</strong></p>

    <p>Si vous êtes disponible pour donner un cours, <a href="https://taelam.com/mon-compte"> connectez-vous à votre tableau de bord </a>et acceptez la demande de votre élève.</p>

    <p>Après avoir accepté la réservation, <strong>les coordonnées telles que email de l'élève et numéro de téléphone vous seront communiqués.</strong></p>


    <p>Si vous n'êtes plus disponible pour donner cours ou pour quelque autre raison vous ne pouvez pas répondre positivement à l'élève, <a href="https://taelam.com/mon-compte">connectez-vous à votre tableau de bord et refusez la demande </a>. En montrant votre professionalisme vous serez plus susceptible d'être contacté(e) à l'avenir et votre réputation sera impeccable.</p>


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


    <p>L’Equipe TAELAM </p>
@stop
