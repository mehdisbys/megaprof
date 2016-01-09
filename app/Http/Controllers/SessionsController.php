<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    /**
     * Create a new sessions controller instance.
     */
    public function __construct()
    {
    }

    /**
     * Show the login page.
     *
     * @return \Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Perform the login.
     *
     * @param  Request  $request
     * @return \Redirect
     */
    public function postLogin(Request $request)
    {
	    $this->validate($request, ['email' => 'required|email', 'password' => 'required']);

	    if ($this->checkUserisConfirmed($request->input('email')) &&  $this->signIn($request)) 
	    {
		    thanks(trans('copy.success.welcome', ['username' => \Auth::user()->username]));
		    return redirect()->intended(session('redirectPath'));
	    }

	    error(trans('copy.errors.signin'));

	    return redirect('login');
    }

    /**
     * Check the user is confirmed 
     *
     * @param $email
     * @return boolean
     */
    public function checkUserisConfirmed($email)
    {
   	$user = \App\Models\User::whereEmail($email)->first(); 
	
	if (!$user) return false;

	return $user->confirmed ? true:false;
    }

    /**
     * Destroy the user's current session.
     *
     * @return \Redirect
     */
    public function logout()
    {
        Auth::logout();

        thanks('You have now been signed out. See ya.');

        return redirect('login');
    }

    /**
     * Attempt to sign in the user.
     *
     * @param  Request $request
     * @return boolean
     */
    protected function signIn(Request $request)
    {
        return Auth::attempt($this->getCredentials($request), $request->has('remember'));
    }

    /**
     * Get the login credentials and requirements.
     *
     * @param  Request $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ];
    }
}
