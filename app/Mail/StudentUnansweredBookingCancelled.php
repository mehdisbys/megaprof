<?php

namespace App\Mail;


use App\Events\CancelUnansweredBookingTriggered;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentUnansweredBookingCancelled extends Mailable
{
    use Queueable, SerializesModels;

    /** @var  User */
    public $prof, $student;
    public $profName, $studentName;

    public function __construct(CancelUnansweredBookingTriggered $event)
    {
        $this->prof = $event->prof;
        $this->student = $event->booking->student;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject(__('emails/requests/unansweredBookingCancelledStudent.subject'));

        $this->studentName = $this->student->firstname;
        $this->profName = $this->prof->firstname;


        return $this->view('emails.requests.unansweredBookingCancelledStudent');
    }
}