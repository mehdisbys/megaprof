<?php

namespace App\Listeners;

use App\Events\ProfCreatedAdvert;
use App\Helpers\Contracts\MailerContract;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminAdvertCreated
{

    private $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  ProfCreatedAdvert  $event
     * @return void
     */
    public function handle(ProfCreatedAdvert $event)
    {
        // Mail prof

        $admins = User::where(['is_admin' => true])->get();

        foreach ($admins as $admin)
        {
            list($all, $config) = emailConfig($admin, 'Nouvelle annonce créée: ' . str_limit($event->advert->title, 25));
            $all['link']        = url('/annonces-en-attente-de-moderation');
            $all['advert']      = $event->advert;

            $this->mailer->sendMail('emails.admin.notifyAdminAdvertWasCreated', $all, $config);
        }
    }
}
