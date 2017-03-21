<?php

namespace App\Events;

use App\Models\User;

class UserConfirmedAccountAndFirstLogin
{


    /** @var  User */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

}


