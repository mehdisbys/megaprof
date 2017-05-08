<?php namespace App\Http\Controllers;

use App\Models\User;
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


    public function loginAs($userId)
    {
        $user = User::find($userId);

        if ($user == NULL) {
            $user = User::where(['email' => $userId])->first();

            if ($user == NULL) {
                error("Pas d'utilisateur avec ID ou email {$userId} trouvé");
                return redirect()->back();
            }
        }

        Auth::login($user);

        return redirect('/mon-compte');
    }

    public function postLogin(Request $request)
    {
        $rules = ['email'                => 'required|email',
                  'password'             => 'required',
                  'g-recaptcha-response' => 'required'];

        if (env('APP_ENV') == 'local') {
            $rules['g-recaptcha-response'] = 'string';
        }

        $this->validate($request, $rules, ['email.required'                 => 'Veuillez entrer votre email',
                                           'email.email'                    => 'Veuillez entrer une addresse email valide',
                                           'password.required'              => 'Veuillez entrer votre mot de passe',]);

        if (isCaptchaCodeCorrect($request->get('g-recaptcha-response')) == false) {
            error("Veuillez cliquer sur \"Je ne suis pas un robot\" ");
            return view('auth.login')->with(['email' => $request->get('email')]);
        }

        if ($this->signIn($request)) {
            thanks("Bonjour " . Auth::user()->firstname . " vous avez été identifié avec succés");

            try{
                activity()->useLog(Auth::user()->email)->log('Login')->causedBy(Auth::user());
            }catch (\Exception $e){}

            return redirect()->intended(session('redirectPath'));
        }

        error("Votre addresse email et/ou votre mot de passe sont invalides. Veuillez réessayer s'il vous plaît.");

        return view('auth.login')->with(['email' => $request->get('email')]);
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
