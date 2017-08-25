<?php


namespace App\Mail;

use App\Events\AdvertWasAcceptedByAdmin;
use App\Models\RegisterStudentInterest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InstantMatchAdvertMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $advert;
    public $studentInterest;

    public function __construct(AdvertWasAcceptedByAdmin $event, RegisterStudentInterest $studentInterest)
    {
        $this->advert          = $event->advert;
        $this->studentInterest = $studentInterest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Un professeur est disponible pour {$this->studentInterest->subject} à {$this->advert->getLocationText()}");

        return $this->view('emails.instantMatch.matchedAdvert');
    }
}