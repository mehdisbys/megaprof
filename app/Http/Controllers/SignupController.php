<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Signup ;
use App\Models\User;
use App\Helpers\Contracts\MailerContract;

class SignupController extends Controller
{
	protected $mailer;

	public function __construct(MailerContract $mailer)
	{
		$this->mailer = $mailer;
	}

	public function getSignup()
	{
		return view('signup.signup');
	}
	
	public function candidateSignup(Signup $request)
	{
		$user = User::newUser($request->all());

        //TODO generate event UserRegistered

		$this->sendConfirmationEmail($user);

		thanks('Un email de confirmation vient de vous être envoyé. Veuillez cliquer sur le lien inclus pour finaliser la création de votre compte');

		return redirect('/');
	}


	public function sendConfirmationEmail(User $user)
	{
		$view = 'emails.auth.confirmEmail';
		$config['to'] = $user->email;
		$config['name'] = $user->firstname;
		$config['subject'] = ucfirst($user->firstname) . ' bienvenue sur Taelam';
		$all['name'] = $user->firstname;
		$all['link'] = url('register/confirm/' . $user->confirmation_code); 

		$this->mailer->sendMail($view, $all, $config);
	}

	/**
	 * Confirm a user's email address.
	 *
	 * @param  string
	 * @return mixed
	 */
	public function confirmEmail($code)
	{
		$user = User::where('confirmation_code',$code)->first();

		if($user == NULL) return redirect('/');
			
		$user->confirmEmail();
		
		thanks("Bienvenue sur Taelam, votre compte a été crée avec succès !");
		
		return redirect('login');
	}

    // Step 1 of password recovery
    public function resetPasswordForm()
    {
        return view('auth.password');
    }

    /**
     * Step 2: getting email to be recovered
     * Attempt to send change password link to the given email
     *
     * @return  Illuminate\Http\Response
     */
    public function resetPassword(Requests\ResetPasswordEmail $request)
    {
        $user = User::whereEmail($request->input('email'))->first();

        if($user)
        {
            $user->generateForgottenToken();
            $this->sendResetPasswordEmail($user);
        }

        thanks("Un email vient de vous être envoyé. Veuillez cliquer sur le lien inclus pour réinitialiser votre mot de passe.");

        return redirect('login');
    }

    /**
     * Step 3 User has clicked on link sent to his account
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  Illuminate\Http\Response
     */
    public function resetPasswordSecondForm($token)
    {
        if(!$this->checkValidToken($token))
        {
            error("Erreur lien de réinitialisation invalide.");
            return redirect()->back();
        }

        return view('auth.reset')->with('token', $token);
    }

    // Step 4: effectively set new password
    public function tryResettingPassword(Requests\ResetPassword $request)
    {
        if(!$this->checkValidToken($request->input('token')))
        {
            error("Erreur lien de réinitialisation invalide.");
            return redirect('/');
        }

        $user = User::getUserFromToken($request->input('token'));

        $user->confirmResetPassword($request->all());

        thanks("Votre mot de passe a été réinitialisé avec succès. Vous pouvez désormais vous connecter avec votre nouveau mot de passe.");

        return redirect('login');
    }

    public function sendResetPasswordEmail(User $user)
    {
        $view = 'emails.auth.resetPassword';
        $config['to'] = $user->email;
        $config['name'] = $user->username;
        $config['subject'] = 'Please reset your password';
        $all['name'] = $user->username;
        $all['link'] = url("reset_token/{$user->forgotten_token}");

        $this->mailer->queueMail($view, $all, $config);
    }

    public function checkValidToken($token)
    {
        return User::where('forgotten_token',$token)->exists();
    }
}
