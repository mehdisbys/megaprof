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

    public function advert()
    {
        return $this->belongsTo(Advert::class, 'advert_id', 'id');
    }

    public static function currentProfBookingRequests()
    {
        return static::where('prof_user_id', \Auth::id())
            ->orWhere('student_user_id', \Auth::id())
            ->with('student')
            ->with('prof')
            ->get();
    }

    public static function bookingExists($booking_id)
    {
        return static::where('prof_user_id', \Auth::id())->where('id', $booking_id)->first();
    }

    public function isStudent()
    {
        return $this->student->id == \Auth::id();
    }

    public function isProf()
    {
        return $this->prof->id == \Auth::id();
    }
}