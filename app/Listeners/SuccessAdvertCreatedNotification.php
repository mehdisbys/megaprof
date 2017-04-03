<?php

namespace App\Listeners;

use App\Events\ProfCreatedAdvert;
use App\Models\Notification;

class SuccessAdvertCreatedNotification
{


    public function handle(ProfCreatedAdvert $event)
    {
        Notification::createAdvertNotification
        ('advert_created',
         '<i class="fa fa-2x fa-check green"></i>  Votre annonce a été créée avec succès ! Nous sommes en train de la valider et elle sera visible par tous les élèves très bientôt.' ,
         '',
         $event->advert->id,
         $event->advert->user_id
        );
    }
}
