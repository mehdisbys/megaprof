<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = ['id'];

    public static function createStubComments($prof_id, $student_id, $advert_id)
    {
        self::create(
            [
                'source_user_id'    => $prof_id,
                'target_user_id'    => $student_id,
                'advert_id'         => $advert_id,
                'comment_at'        => Carbon::now()->addWeek()
            ]
        );

        self::create(
            [
            'source_user_id'        => $student_id,
            'target_user_id'        => $prof_id,
            'advert_id'             => $advert_id,
            'comment_at'            => Carbon::now()->addWeek()
             ]
        );
    }
}