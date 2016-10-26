<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
     * @param  Request $request
     * @return \Redirect
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, ['email'    => 'required|email',
                                   'password' => 'required',
                                   'captcha'  => 'required']);

        if (isCaptchaCodeCorrect($request->get('captcha')) == false) {
            error("Le code de sécurité est invalide. Veuillez réessayer s'il vous plaît.");
            return redirect('login');
        }

        if ($this->checkUserisConfirmed($request->input('email')) && $this->signIn($request)) {
            thanks("Bonjour " . Auth::user()->firstname . " vous avez été identifié avec succés");

            return redirect()->intended(session('redirectPath'));
        }

        error("Votre addresse email et/ou votre mot de passe sont invalides. Veuillez réessayer s'il vous plaît.");

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

        return $user->confirmed ? true : false;
    }

    /**
     * Destroy the user's current session.
     *
     * @return \Redirect
     */
    public function logout()
    {
        $user = Auth::user();

        Auth::logout();

        if ($user) {
            thanks('Vous êtes maintenant déconnecté. À bientôt ' . $user->firstname . ' !');
        }

        return redirect('/');
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
