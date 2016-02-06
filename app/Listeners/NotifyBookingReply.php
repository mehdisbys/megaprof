<?php

namespace App\Listeners;

use App\Events\BookingRequestReply;
use App\Events\BookingRequestSent;
use App\Helpers\Contracts\MailerContract;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

class NotifyBookingReply
{
    private $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  BookingRequestReply  $event
     * @return void
     */
    public function handle(BookingRequestReply $event)
    {
        // Mail prof
//        list($all, $config) = emailConfig($event->booking->prof, 'vous avez reçu une demande de cours');
//        $all['link']        = url('/mon-compte');
//        $this->mailer->sendMail('emails.requests.bookingRequestProf', $all, $config);

        //Mail student
        list($all, $config) = emailConfig($event->booking->student, 'votre demande a été acceptée');
        $this->mailer->sendMail('emails.replies.bookingReplyAccepted', $all, $config);
    }
}
