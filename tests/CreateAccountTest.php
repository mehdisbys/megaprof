<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class CreateAccountTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_user_may_register_for_an_account_but_must_confirm_their_email_address()
    {
        $form = $this->fakeSignupData();

        // When we register...
        $this->visit('inscription')
            ->submitForm('Submit', $form);

        // We should have an account - but one that is not yet confirmed/verified.
        $this //->see('Un email de confirmation vient de vous être envoyé')
            ->seeInDatabase('users', ['email' => $form['email'], 'confirmed' => 0])
            ->notSeeInDatabase('users', ['email' => $form['email'], 'confirmation_code' => null]);

        $user = \App\Models\User::whereEmail($form['email'])->first();

        // You can't login until you confirm your email address.
        $this->login($user)->see(trans('copy.errors.signin'));

        // Like this...
        $this->visit("register/confirm/{$user->confirmation_code}")
            ->see(trans('copy.success.signup.confirmed'))
            ->seeInDatabase('users', ['email' => $form['email'], 'confirmed' => 1]);

        $u = \App\Models\User::whereEmail($form['email'])->first();

        //Finally login
        $this->login($u)->see('Se déconnecter');
        $this->logout();
    }


    protected function login($user)
    {
        return $this->visit('login')
            ->type($user->email, 'email')
            ->type('password', 'password')
            ->press('Login');
    }

    protected function logout()
    {
        return Auth::logout();
    }

    public function fakeSignupData()
    {
        $faker = Faker::create();

        return [
            'firstname'             =>  $faker->name,
            'lastname'              =>  $faker->name,
            'email'                 =>  $faker->email,
            'password'              =>  'password',
            'password_confirmation' =>  'password'
        ];
    }
}
