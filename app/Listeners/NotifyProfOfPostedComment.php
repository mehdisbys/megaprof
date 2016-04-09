<?php
namespace App\Listeners;

use App\Events\StudentCommentedOnProf;
use App\Helpers\Contracts\MailerContract;

class NotifyProfOfPostedComment
{
    private $mailer;


    /**
     * NotifyPostedComment constructor.
     * @param MailerContract $mailer
     */
    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  StudentCommentedOnProf  $event
     * @return void
     */
    public function handle(StudentCommentedOnProf $event)
    {
        //
    }
}
