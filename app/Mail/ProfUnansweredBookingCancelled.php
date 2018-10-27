<?php

namespace App\Mail;


use App\Events\CancelUnansweredBookingTriggered;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProfUnansweredBookingCancelled extends Mailable
{
    use Queueable, SerializesModels;

    /** @var  User */
    public $user;
    public $profName;

    public function __construct(CancelUnansweredBookingTriggered $event)
    {
        $this->user = $event->prof;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Réservation expirée');

        $this->profName = $this->user->firstname;

        return $this->view('emails.requests.unansweredBookingCancelledProf');
    }
}