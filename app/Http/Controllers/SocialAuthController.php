<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
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
        $user = $this->createOrGetUser($providerUser);
        $this->getAndSaveAvatar($providerUser, $user);
        Auth::login($user);
        if($user->isMandatoryProfileInComplete()) {
        }
        // if missing information -> ask for personal information
        return redirect()->intended('/annonces');
    }

    public function createOrGetUser(\Laravel\Socialite\Two\User $providerUser): User
    {
        $account = User::where('facebook_id', $providerUser->id)->first();

        $gender = ['male' => 'man', 'female' => 'woman'];

        if ($account) {
            return $account;
        } else {

            $user = User::where('email', $providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create(
                    [
                        'firstname'    => $providerUser->getName(),
                        'lastname'     => '',
                        'gender'       => $gender[$providerUser->user['gender']] ?? null,
                        'email'        => $providerUser->getEmail(),
                        'password'     => bcrypt(bin2hex(random_bytes(10))),
                        'facebook_id'  => $providerUser->id,
                        'confirmed'    => 1,
                        'auto_created' => 1,
                    ]
                );
            }
            return $user;
        }
    }

    public function getAndSaveAvatar(\Laravel\Socialite\Two\User $providerUser, User $user)
    {
        $avatar = Avatar::firstOrCreate(['user_id' => $user->id]);
        $avatar->handleFacebookAvatar($providerUser->avatar_original);
        $avatar->user_id = $user->id;
        $avatar->save();
    }
}
