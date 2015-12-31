<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{

    protected $table = 'adverts';

    protected $guarded = [];


    public function getAvatar()
    {
        return "/avatar/{$this->user_id}/{$this->id}";
    }
}