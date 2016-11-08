<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FlaggedAdvert extends Model
{
    protected $table   = 'flagged_adverts';
    protected $guarded = ['id'];

}