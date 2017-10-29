<?php

namespace App\Mail;

use App\Events\UserCreatedAccountAndFirstLogin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $link;
    public $name;

    public function __construct(UserCreatedAccountAndFirstLogin $event)
    {
        $this->user = $event->user;
        $this->link = url('register/confirm/' . $this->user->confirmation_code);
        $this->name = $this->user->firstname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject(ucfirst($this->user->firstname) . ' bienvenue sur TAELAM ! – Confirmation de votre inscription');

        return $this->view('emails.auth.confirmEmail');
    }
}
