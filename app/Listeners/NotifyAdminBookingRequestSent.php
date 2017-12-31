<?php


namespace App\Listeners;


use App\Events\BookingRequestSent;
use App\Events\ProfCreatedAdvert;
use App\Helpers\Contracts\MailerContract;
use App\Models\Advert;
use App\Models\User;

class NotifyAdminBookingRequestSent
{

    private $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  BookingRequestSent  $event
     * @return void
     */
    public function handle(BookingRequestSent $event)
    {
        $admins = User::where(['is_admin' => true])->get();

        foreach ($admins as $admin)
        {
            $advert = Advert::find($event->booking->advert_id);
            list($all, $config) = emailConfig($admin, 'Nouvelle Réservation pour : ' . str_limit($advert->title, 25));
            $all['link']        = url('/annonces-en-attente-de-moderation');
            $all['advert']      = $advert;

            $this->mailer->sendMail('emails.admin.notifyAdminBookingRequestWasSent', $all, $config);
        }
    }
}
