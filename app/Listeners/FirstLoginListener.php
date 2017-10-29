<?php

namespace App\Listeners;

use App\Events\UserCreatedAccountAndFirstLogin;
use App\Mail\RegistrationEmail;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;

class FirstLoginListener
{

    /**
     * Handle the event.
     *
     * @param  UserCreatedAccountAndFirstLogin $event
     * @return void
     */
    public function handle(UserCreatedAccountAndFirstLogin $event)
    {
        // Send Welcome Registration email
        Mail::to($event->user)->send(new RegistrationEmail($event));

        // Dashboard Events
        Notification::createAdvertNotification
        ('first_login',
         "Bienvenue sur Taelam  <i class='fa fa-thumbs-o-up'></i>! Ceci est votre tableau de bord, il vous aidera a gérer vos cours et réservations.
          <br> 
          <a id=\"donner-des-cours\" class=\"button\" href=\"/nouvelle-annonce-1\">Donner des cours</a>",
         '',
         '',
         $event->user->id
        );

        Notification::createAdvertNotification
        ('first_login',
         "<i class='fa fa-camera-retro'></i> Allez dans 'Gérer mon profil' ajoutez une photo de vous et <strong>multipliez vos chances d'avoir des réservations d'élèves </strong>!",
         '',
         '',
         $event->user->id
        );

    }
}
