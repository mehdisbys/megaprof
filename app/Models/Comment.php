<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table   = 'comments';
    protected $guarded = ['id'];

    public function targetUser()
    {
        return $this->belongsTo(User::class, 'target_user_id', 'id');
    }

    public function sourceUser()
    {
        return $this->belongsTo(User::class, 'source_user_id', 'id');
    }

    public function advert()
    {
        return $this->belongsTo(Advert::class, 'advert_id', 'id');
    }

    public static function createStubComments($prof_id, $student_id, $advert_id)
    {
        //Student
        self::create(
            [
                'source_user_id'  => $student_id,
                'owner_advert_id' => $prof_id,
                'target_user_id'  => $prof_id,
                'advert_id'       => $advert_id,
                'comment_at'      => Carbon::now()->addWeek()
            ]
        );
    }

    public static function resourceBelongsToLoggedUser(int $id)
    {
        return self::where(['id' => $id, 'source_user_id' => \Auth::id()])->exists();
    }

    public static function currentUserPendingComments()
    {
        return self::where(['source_user_id' => \Auth::id(), 'comment' => NULL])
                   ->whereDate('comment_at', '<=', Carbon::now())
                   ->with(['targetUser' => function($q){$q->select(['id','firstname']);}])
                   ->get();
    }

    public static function retrieve($id)
    {
        return self::where(['id' => $id, 'source_user_id' => \Auth::id()])
            ->with(['targetUser' => function($q){$q->select(['id','firstname']);}])
            ->with(['advert'     => function($q){$q->select(['id', 'title']);}])
            ->get();
    }

    public function iWasTheProf(): bool
    {
        return $this->source_user_id == $this->owner_advert_id;
    }

    public function iWasTheStudent(): bool
    {
        return $this->source_user_id != $this->owner_advert_id;
    }

    public static function commentsForAdvertId(int $advertId)
    {
        return Comment::where(['advert_id' => $advertId])->whereNotNull('comment')->get();
    }
}