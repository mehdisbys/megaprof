<?php

namespace App\Taelam\Users;


use App\Events\UserCreatedAccountAndFirstLogin;

class User
{

    public function register(string $firstname, string $lastname, string $email, string $password): \App\Models\User
    {

        $exists = \App\Models\User::where(['email' => $email])->exists();

        if ($exists) {
            throw new UserAlreadyRegistered();
        }

        $user = \App\Models\User::newUser($firstname, $lastname, $email, $password);

        event(new UserCreatedAccountAndFirstLogin($user));

        return $user;
    }
}