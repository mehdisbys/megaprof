<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class IdDocument extends Model
{
    protected $table = 'prof_identification';

    protected $guarded = ['id', 'created_at', 'deleted_at'];


    public static function hasIdDocument(int $userid)
    {
        return self::where('user_id', $userid)->exists();
    }
}