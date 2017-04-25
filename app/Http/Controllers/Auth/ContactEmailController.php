<?php
namespace App\Http\Controllers\Auth;


use App\Helpers\Contracts\MailerContract;
use App\Http\Controllers\Controller;

class ContactEmailController extends Controller
{
    protected $contactEmail = 'contact@taelam.com';

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    public function postContact($request)
    {
        if (isCaptchaCodeCorrect($request->get('g-recaptcha-response')) == false) {
            error("Veuillez cliquer sur \"Je ne suis pas un robot\" ");

            return view('signup.signup')->with(
                [
                    'email'     => $request->get('email'),
                    'firstname' => $request->get('firstname'),
                    'subject'   => $request->get('subject'),
                    'message'   => $request->get('message'),
                ]);
        }

        thanks('Merci ! Votre email a éte envoyé avec succès. Nous vous répondrons dans les plus brefs délais');

        return redirect('/');
    }


    public function sendContactEmail($subject, $firstname)
    {
        $view = 'emails.auth.confirmEmail';
        $config['to'] = $this->contactEmail;
        $config['name'] = $firstname;
        $config['subject'] = 'Contact email: ' . $subject;
        $all['name'] = 'Support';

        $this->mailer->sendMail($view, $all, $config);

    }


}