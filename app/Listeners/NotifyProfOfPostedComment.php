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
        Notification::newCommentNotification(
            $event->comment->advert->id,
            $event->comment->targetUser->id,
            $event->comment->sourceUser->firstname,
            '/' . $event->comment->advert->slug
        );

        list($all, $config) = emailConfig(
            $event->comment->targetUser,
            'Vous avez un nouveau commentaire de la part de ' . $event->comment->sourceUser->firstname
        );

        $all['link']        = url('/mon-compte');
        $this->mailer->sendMail('emails.comment.StudentCommented', $all, $config);
    }
}
