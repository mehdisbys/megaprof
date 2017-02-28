<?php

namespace App\Listeners;

use App\Events\AdvertWasRejectedByAdmin;
use App\Helpers\Contracts\MailerContract;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyProfAdvertWasRejected
{
    private $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  AdvertWasRejectedByAdmin  $event
     * @return void
     */
    public function handle(AdvertWasRejectedByAdmin $event)
    {
        // Dashboard Events
        Notification::createAdvertNotification
        ('advert_rejected',
         $event->message,
         '',
         $event->advert->id,
         $event->advert->user_id
        );

        // Mail prof
        list($all, $config) = emailConfig(User::find($event->advert->user_id), ' modifications demandées avant publication de votre annonce');
        $all['link']        = url('/mon-compte');
        $all['advert']      = $event->advert;
        $all['message']     = $event->message;

        $this->mailer->sendMail('emails.admin.advertWasRejected', $all, $config);

    }
}
