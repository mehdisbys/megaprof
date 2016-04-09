<?php
namespace App\Listeners;

use App\Events\BookingRequestSent;
use App\Helpers\Contracts\MailerContract;
use App\Models\Notification;

class NotifyBookingRequest
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
        // Dashboard Events
        Notification::AddBookingToDashboard($event->booking->advert->id, $event->booking->prof->id);

        // Mail prof
        list($all, $config) = emailConfig($event->booking->prof, 'vous avez reçu une demande de cours');
        $all['link']        = url('/mon-compte');
        $this->mailer->sendMail('emails.requests.bookingRequestProf', $all, $config);

        //Mail student
        list($all, $config) = emailConfig($event->booking->student, 'votre demande a bien été envoyée');
        $this->mailer->sendMail('emails.requests.bookingRequestStudent', $all, $config);
    }
}
