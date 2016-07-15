<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $providerUser = Socialite::driver('facebook')->user();
        $token = $providerUser->token;
     //   dd($providerUser);
        $user = $this->createOrGetUser($providerUser);
        Auth::login($user);
        return redirect('/mon-compte');
    }

    public function createOrGetUser(\Laravel\Socialite\Two\User $providerUser)
    {
        $account = User::where('facebook_id', $providerUser->id)->first();

        if ($account) {
            return $account;
        } else {

            $user = User::where('email', $providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'firstname'    => $providerUser->getName(),
                    'lastname'     => '',
                    'email'        => $providerUser->getEmail(),
                    'password'     => bcrypt(bin2hex(random_bytes(10))),
                    'facebook_id'  => $providerUser->id,
                    'confirmed'    => 1,
                    'auto_created' => 1
                ]);
            }
            return $user;
        }
    }
}
