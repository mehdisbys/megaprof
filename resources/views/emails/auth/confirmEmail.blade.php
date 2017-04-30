@extends('emails.master')
@section('content')

    <h2>{{$name or ''}}, Bienvenue sur TAELAM ! – Confirmation de votre inscription</h2>
    <br>

    <p>Bonjour {{$name or ''}},</p>

    <br>

    <p>Pour commencer à bénéficier de nos services, merci de confirmer la création de votre compte en cliquant sur le bouton suivant :</p>
    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
           style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #fd875e; text-align: center;" class="button-td">
                <a href="{{$link or ''}}"
                   style="background: #fd875e; border: 15px solid #fd875e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                   class="button-a">
                    <span style="color:#ffffff;" class="button-link">Se connecter</span>
                </a>
            </td>
        </tr>
    </table>
    <br>
    <p>Nous vous remercions de votre confiance, suivez-nous sur les réseaux sociaux pour être au courant de l'actualité
 Taelam.</p>
    <br>
    <p>
        À très bientôt sur <a href="http://www.taelam.com">Taelam</a></p>
    <br>

    <p>L'Équipe Taelam</p>

@stop
