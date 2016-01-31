<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'book_lesson';
    protected $guarded = ['id'];


    public function prof()
    {
        return $this->belongsTo(User::class, 'prof_user_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_user_id', 'id');
    }

    public static function currentProfBookingRequests()
    {
        return static::where('prof_user_id', \Auth::id())->with('student')->get();
    }
}