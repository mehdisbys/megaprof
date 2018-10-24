<?php

namespace App\Mail;


use App\Events\CancelUnansweredBookingTriggered;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProfUnansweredBookingCancelled extends Mailable
{
    use Queueable, SerializesModels;

    /** @var  User */
    public $user;

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

        $this->subject('');

        return $this->view($this->reminder->reminder->getEmailView());
    }
}