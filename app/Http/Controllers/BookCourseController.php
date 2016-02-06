<?php
namespace App\Http\Controllers;


use App\Events\BookingRequestReply;
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

        return redirect('/mon-compte');
    }

    public function replyBookingRequest($booking_id, $answer)
    {
        $booking = Booking::bookingExists($booking_id);

        if ($booking == null) {
            error("Cette demande de cours n'existe pas");
            return redirect()->back();
        }
        $booking->answer = $answer;
        $booking->save();

        Event::fire(new BookingRequestReply($booking));
        return redirect('/mon-compte');
    }
}