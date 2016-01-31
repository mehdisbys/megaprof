<?php

namespace App\Listeners;

use App\Events\BookingRequestSent;
use App\Helpers\Contracts\MailerContract;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        // Mail prof
        $user = $event->booking->prof;
        $view = 'emails.requests.bookingRequestProf';
        $config['to'] = $user->email;
        $config['name'] = $user->firstname;
        $config['subject'] = ucfirst($user->firstname) . ' vous avez reçu une demande de cours';
        $all['name'] = $user->firstname;
        $all['link'] = url('/mon-compte');

        $this->mailer->sendMail($view, $all, $config);

        //Mail student
        $user = $event->booking->student;
        $view = 'emails.requests.bookingRequestStudent';
        $config['to'] = $user->email;
        $config['name'] = $user->firstname;
        $config['subject'] = ucfirst($user->firstname) . ' votre demande a bien été envoyée';
        $all['name'] = $user->firstname;

        $this->mailer->sendMail($view, $all, $config);
    }
}
