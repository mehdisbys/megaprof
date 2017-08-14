<?php

namespace App\Taelam\CreateAdvert;

use Illuminate\Database\Eloquent\Model;

class Advert
{

    public function newAdvert($userId): Model
    {
        return $advert = Advert::create(['user_id' => $userId]);
    }

    public function getById($advertId)
    {
        return Advert::find(session('advert_id'));
    }

    public function setSubjects()
    {

    }
}