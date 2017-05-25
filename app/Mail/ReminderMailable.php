<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Reminders\Events\ReminderEmail;

class ReminderMailable extends Mailable
{
    use Queueable, SerializesModels;

    /** @var  ReminderEmail */
    public $reminder;

    /** @var  User */
    public $user;

    /** @var  Collection */
    public $arguments;

    public function __construct(ReminderEmail $reminder)
    {
        $this->reminder = $reminder;
        $this->user = $reminder->user;
        $this->arguments = $reminder->reminder->getEmailViewArguments();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject($this->reminder->reminder->getEmailSubject($this->user));

        return $this->view($this->reminder->reminder->getEmailView());
    }
}
