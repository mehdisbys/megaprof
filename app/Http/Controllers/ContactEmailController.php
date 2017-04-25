<?php
namespace App\Http\Controllers;


use App\Helpers\Contracts\MailerContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactEmailController extends Controller
{
    protected $contactEmail = 'contact@taelam.com';
    protected $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email'   => "required",
            'message' => "required|max:1000",
        ],
                        [
                            'email.required'   => 'Veuillez entrer votre email',
                            'email.email'      => 'Veuillez entrer une addresse email valide',
                            'message.required' => 'Veuillez entrer votre message',
                        ], []);


        if (isCaptchaCodeCorrect($request->get('g-recaptcha-response')) == false) {
            error("Veuillez cliquer sur \"Je ne suis pas un robot\" ");

            return redirect()->back()->with(
                [
                    'email'     => $request->get('email'),
                    'firstname' => $request->get('firstname'),
                    'subject'   => $request->get('subject'),
                    'message'   => $request->get('message'),
                ]);
        }

        $this->sendContactEmail($request->get('subject'), $request->get('firstname'), $request->get('message'), $request->get('email'));

        thanks('Merci ! Votre email a éte envoyé avec succès. Nous vous répondrons dans les plus brefs délais');

        return redirect('/');
    }


    public function sendContactEmail(string $subject, string $firstname, string $message, string $userEmail)
    {
        $view                   = 'emails.contact.contactEmail';
        $config['to']           = $this->contactEmail;
        $config['name']         = 'Equipe Taelam';
        $config['subject']      = 'Support email: ' . $subject;
        $all['messageFromUser'] = $message;
        $all['userEmail']       = $userEmail;
        $all['userName']        = $firstname;
        $all['hasAccount']      = Auth::check() ? 'Oui' : 'Non';
        $all['subject']         = $subject;

        $this->mailer->sendMail($view, $all, $config);
    }


}