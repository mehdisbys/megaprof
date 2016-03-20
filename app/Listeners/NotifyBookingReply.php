<?php

namespace App\Listeners;

use App\Events\BookingRequestReply;
use App\Helpers\Contracts\MailerContract;
use App\Models\Comment;

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
     * @param  BookingRequestReply $event
     * @return void
     */
    public function handle(BookingRequestReply $event)
    {
        // Mail prof
        $all['link']        = url('/mon-compte');

        //Mail student
        if ($event->booking->answer == 'yes') {
            list($all, $config) = emailConfig($event->booking->student, 'votre demande a été acceptée');
            $this->mailer->sendMail('emails.replies.bookingReplyAccepted', $all, $config);
            Comment::createStubComments($event->booking->prof->id, $event->booking->student->id, $event->booking->advert->id);
        }
        if ($event->booking->answer == 'no') {
            list($all, $config) = emailConfig($event->booking->student, 'votre demande a été refusée');
            $this->mailer->sendMail('emails.replies.bookingReplyRejected', $all, $config);
        }
    }
}
