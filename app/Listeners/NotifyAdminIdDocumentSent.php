<?php
namespace App\Listeners;


use App\Events\IdDocumentSent;
use App\Helpers\Contracts\MailerContract;

class NotifyAdminIdDocumentSent
{
    private $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(IdDocumentSent $event)
    {
        $config['to']      = 'mehdi.souihed@gmail.com, mehdi.souihed@sainsburys.co.uk';
        $config['name']    = 'Taelam';
        $config['subject'] = "Une pièce d'identité de professeur nécessite une validation";
        $all['profname']   = $event->user->name;

        $this->mailer->sendMail('emails.admin.iDDocumentVerification', $all, $config);
    }
}