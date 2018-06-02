<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\MailerContract;
use App\Models\Advert;
use App\Models\FlaggedAdvert;
use App\Models\User;
use Illuminate\Http\Request;

class FlaggedAdvertsController extends Controller
{

    protected $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    public function getForm($slug)
    {
        $advert = Advert::findBySlugOr404($slug);

        return view('flagAdvert.FlagAdvertForm', ['advert' => $advert]);
    }

    public function postForm(Request $request)
    {
        if (isCaptchaCodeCorrect($request->get('g-recaptcha-response')) == false) {
            error("Le code de sécurité est invalide. Veuillez réessayer s'il vous plaît.");
            return redirect('register');
        }

        $data =  $request->all(['email', 'advert_id', 'comment', 'user_id']);
        FlaggedAdvert::create($data);
        thanks('Merci de nous avoir signalé cette annonce. Nous allons traiter votre demande dans les plus brefs délais');

        $advert = Advert::find($data['advert_id']);

        $this->sendEmail(User::where(['email' => 'mehdi.souihed@gmail.com'])->first(), $advert, 'emails.flaggedAdvert.flag');

        return redirect('/');
    }

    public function sendEmail(User $user, Advert $advert, string $view)
    {
        $config['to'] = $user->email;
        $config['name'] = $user->firstname;
        $config['subject'] = "Signalement d'annonce non-conforme";

        $all['name'] = $user->firstname;
        $all['link'] = url('/' . $advert->slug);

        $this->mailer->sendMail($view, $all, $config);
    }

    public function suspendAdvert($slug)
    {
       if( \Auth::user()->isAdmin())
       {
           /** @var Advert $advert */
           $advert = Advert::findBySlugOr404($slug);
           $advert->suspend();
           thanks("L'annonce {$advert->title} a été suspendue et un email vient d'être envoyé à l'utilisateur concerné");

           $this->sendEmail($advert->user, $advert, 'emails.flaggedAdvert.notifyOwnerFlagged');

           return redirect('/');
       }

    }
}
