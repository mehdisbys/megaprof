<?php
namespace App\Listeners;

use App\Events\AdvertWasAcceptedByAdmin;
use App\Events\AdvertWasRejectedByAdmin;
use App\Helpers\Contracts\MailerContract;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class NotifiyProfAdvertWasApproved
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
    public function handle(AdvertWasAcceptedByAdmin $event)
    {
        // Dashboard Events
        Notification::createAdvertNotification
        ('advert_accepted',
         'Votre annonce a été approuvée par la modération',
         '',
         $event->advert->id,
         $event->advert->user_id
        );
    }
}
