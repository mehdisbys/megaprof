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

	public function getRecruiterSignup()
	{
		return view('signup.candidateSignup');
	}

	public function getSignup()
	{
		return view('signup.signup');
	}
	
	public function candidateSignup(Signup $request)
	{
		$role = \App\Models\Role::whereName('test')->first();

		$user = User::newUser($request->all());

        //TODO generate event UserRegistered

		$this->sendConfirmationEmail($user);

		//$user->attachRole($role);

		thanks('Un email de confirmation vient de vous être envoyé');

		return redirect('/');
	}


	public function sendConfirmationEmail(User $user)
	{
		$view = 'emails.auth.confirmEmail';
		$config['to'] = $user->email;
		$config['name'] = $user->firstname;
		$config['subject'] = ucfirst($user->firstname) . ' bienvenue sur Megaprof';
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
		
		thanks(trans('copy.success.signup.confirmed'));
		
		return redirect('login');
	}
}
