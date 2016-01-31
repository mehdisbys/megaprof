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
//        $view = 'emails.auth.confirmEmail';
//        $config['to'] = $user->email;
//        $config['name'] = $user->firstname;
//        $config['subject'] = ucfirst($user->firstname) . ' bienvenue sur Megaprof';
//        $all['name'] = $user->firstname;
//        $all['link'] = url('register/confirm/' . $user->confirmation_code);
//
//        $this->mailer->sendMail($view, $all, $config);

    }
}
