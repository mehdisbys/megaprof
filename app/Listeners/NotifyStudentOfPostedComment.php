<?php
namespace App\Listeners;

use App\Events\ProfCommentedOnStudent;
use App\Helpers\Contracts\MailerContract;
use App\Models\Notification;


class NotifyStudentOfPostedComment
{
    private $mailer;


    /**
     * NotifyStudentOfPostedComment constructor.
     * @param MailerContract $mailer
     */
    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  ProfCommentedOnStudent  $event
     * @return void
     */
    public function handle(ProfCommentedOnStudent $event)
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
        $this->mailer->sendMail('emails.comment.profCommented', $all, $config);
    }
}
