<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DegreeDocument extends Model
{
    protected $table = 'prof_degree_document';

    protected $guarded = ['id', 'created_at', 'deleted_at'];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function hasIdDocument(int $userid)
    {
        return self::where('user_id', $userid)->exists();
    }

    public static function getByUserId(int $userid)
    {
        return self::where('user_id', $userid)->first();
    }

    public static function isVerified(int $userid)
    {
        return self::where(['user_id' => $userid, 'verified' => true])->exists();
    }
}