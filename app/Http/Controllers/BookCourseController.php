<?php
namespace App\Http\Controllers;


use App\Events\BookingRequestSent;
use App\Http\Requests\BookLesson;
use App\Models\Advert;
use App\Models\Booking;
use Illuminate\Support\Facades\Event;

class BookCourseController extends Controller
{
    public function bookLesson($advert_id)
    {
        $advert = Advert::find($advert_id);

        return view('main.bookLesson')->with(compact('advert'));
    }

    public function postBookLesson(BookLesson $request)
    {
        $booking = $request->except('_token');

        $booking['student_user_id'] = \Auth::id();

        $bookModel = Booking::create($booking);

        Event::fire(new BookingRequestSent($bookModel));

    }
}