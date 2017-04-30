<?php

namespace App\Http\Controllers;


use App\Helpers\Contracts\MailerContract;

class EmailController
{

    private $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    public function envoyer()
    {
        $emails = [
            'ahmed.errouche@gmail.com',
            'nesrine.elmouedin@gmail.com',
            'ahmed.moubtassime@gmail.com',
            'youssef.alidrissi.12@gmail.com',
            'khaoula.lagrini@gmail.com',
            'elm.benbihi@gmail.com',
            'aidoudi@hotmail.fr',
            'imnir.badreddine@gmail.com',
            'chakroun29@yahoo.fr',
            'benabou.anass@gmail.com',
            'h.kaoutra@gmail.com',
            'mehdi199maths@gmail.com',
            'maytanite@gmail.com',
            'groupe.iqraa@Gmail.com',
            'belkouche.wiam@gmail.com',
            'n.sebti.prof@gmail.com',
            'fadel11000@gmail.com',
            'youssef.akaddar@gmail.com',
            'mohamed@amdan.info',
            'anass.mq@gmail.com',
            'a.sakim@yahoo.com',
            'om.coeching@gmail.com',
            'bobozinzin@gmail.com',
            'sefrioui11@gmail.com',
            'habbatkarima@gmail.com',
            'marocmara@gmail.com',
            'imadelmajidi@yahoo.fr',
            'jessicagiry@gmail.com'];

        foreach ($emails as $email)
        {
            $config['to']      = $email;
            $config['name']    = 'Taelam';
            $config['subject'] = "Lancement de Taelam - Cours particuliers au Maroc";
            $this->mailer->sendMail('emails.marketing.premierContactProf', [], $config);
            sleep(2);
        }
    }
}