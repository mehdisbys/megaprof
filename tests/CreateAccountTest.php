<?php
namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;

class CreateAccountTest extends DuskTestCase
{

    public function testAccountCreation()
    {
        $email = 'Ali.zaoua@ma.com';
        $user  = User::where(['email' => $email])->first();

        if ($user) {
            $user->delete();
        }

        $this->browse(function (Browser $browser) {
            // When we register...
            $browser->visit('/inscription')
                ->type('firstname', 'Ali')
                ->type('lastname', 'Zaoua')
                ->type('email', 'Ali.zaoua@ma.com')
                ->type('password', 'abc12345')
                ->type('password_confirmation', 'abc12345')
                ->press("#submit-btn-register")
                ->assertSee('Un email de confirmation vient de vous être envoyé');
        });
        // We should have an account - but one that is not yet confirmed/verified.
        $this//->see('Un email de confirmation vient de vous être envoyé')
        ->assertDatabaseHas('users', ['email'     => $email,
                                      'confirmed' => 0])
            ->assertDatabaseMissing('users', ['email'             => $email,
                                              'confirmation_code' => null]);

        $user = \App\Models\User::whereEmail($email)->first();

        // You can't login until you confirm your email address.
        // $this->login($user)->see(trans('copy.errors.signin'));

        // Like this...
        $this->browse(function (Browser $browser) use ($user) {

            $browser->visit("/register/confirm/{$user->confirmation_code}")
                ->assertSee('Se connecter');

        });


        $this->assertDatabaseHas('users', ['email'     => $email,
                                           'confirmed' => 1]);

        $user = User::where(['email' => $email])->first();

        if ($user) {
            $user->delete();
        }

//        $u = \App\Models\User::whereEmail($email)->first();
//
//        //Finally login
//        $this->login($u);
//        $this->logout();

    }


    protected function login($user)
    {
        $this->browse(function (Browser $browser) use ($user) {

            $browser->visit('login')
                ->type($user->email, 'email')
                ->type('password', 'abc12345')
                ->press('Login')
                ->assertSee('Se déconnecter');
        });
    }

    protected function logout()
    {
        return Auth::logout();
    }

    public function fakeSignupData()
    {
        $faker = Faker::create();

        return [
            'firstname'             => $faker->name,
            'lastname'              => $faker->name,
            'email'                 => $faker->email,
            'password'              => 'password',
            'password_confirmation' => 'password',
        ];
    }
}
