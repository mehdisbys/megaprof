<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Collection;
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
        return $this->belongsTo(Advert::class, 'advert_id', 'id')->withTrashed();
    }

    public static function currentProfBookingRequests()
    {
        return static::where(function ($q) {
            $q->where('prof_user_id', \Auth::id())
                ->orWhere('student_user_id', \Auth::id());
        })
            ->whereNull('answer')
            ->with('student')
            ->with('prof')
            ->with('advert')
            ->orderBy('updated_at', 'desc')
            ->get();
    }


    public static function getProfBookingRequests(User $prof)
    {
        return static::where(function ($q) use ($prof) {
            $q->where('prof_user_id', $prof->id)
                ->orWhere('student_user_id', $prof->id);
        })
            ->whereNull('answer')
            ->with('student')
            ->with('advert')
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public static function getAcceptedProfBookings(User $prof)
    {
        return static::where(function ($q) use ($prof) {
            $q->where('prof_user_id', $prof->id);
        })
            ->where('answer', '=', 'yes')
            ->get();
    }

    public static function getUnansweredProfBookings(User $prof)
    {
        return static::where(function ($q) use ($prof) {
            $q->where('prof_user_id', $prof->id);
        })
            ->where('answer', '=', NULL)
            ->get();
    }


    public static function archivedBookingRequests()
    {
        return static::where(function ($q) {
            $q->where('prof_user_id', \Auth::id())
                ->orWhere('student_user_id', \Auth::id());
        })
            ->whereNotNull('answer')
            ->with('student')
            ->with('prof')
            ->with('advert')
            ->orderBy('updated_at', 'desc')
            ->get();
    }


    /**
     * @return Collection
     */
    public static function bookingRequestsUserReceived()
    {
        return static::where('prof_user_id', \Auth::id())
            ->with('student')
            ->with('prof')
            ->with('advert')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function bookingExists($booking_id, $userId = null)
    {
        return static::where('prof_user_id', $userId ?? \Auth::id())->where('id', $booking_id)->first();
    }

    public function isStudent()
    {
        return $this->student->id == \Auth::id();
    }

    public function isProf()
    {
        return $this->prof->id == \Auth::id();
    }

    public function wasAccepted()
    {
        return $this->answer == 'yes';
    }

    public function wasRejected()
    {
        return $this->answer == 'no';
    }

    public function wasCancelled()
    {
        return $this->answer == '-';
    }

    public function isWaitingReply()
    {
        return $this->answer == null;
    }

    public function cancel()
    {
        $this->answer = '-';
        $this->save();
    }

}