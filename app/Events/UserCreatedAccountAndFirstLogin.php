<?php

namespace App\Events;

use App\Models\User;

class UserCreatedAccountAndFirstLogin
{


    /** @var  User */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

}


