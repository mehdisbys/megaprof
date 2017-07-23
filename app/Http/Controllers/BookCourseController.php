<?php
namespace App\Http\Controllers;


use App\Events\BookingRequestReply;
use App\Events\BookingRequestSent;
use App\Http\Requests\BookLesson;
use App\Models\Advert;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;


class BookCourseController extends Controller
{
    public function bookLesson($slug)
    {
        $advert = Advert::findBySlugOr404($slug);

        return view('main.bookLesson')->with(compact('advert'));
    }

    public function postBookLesson(BookLesson $request)
    {
        $booking = $request->only(['prof_user_id', 'advert_id', 'presentation','date','location','client','mobile','addresse', 'pick_a_date','pick_a_location']);

        $date = $request->only([ 'dobday', 'dobmonth','dobyear']);

        $dateOfBirth = Carbon::createFromDate($date["dobyear"], $date["dobmonth"], $date["dobday"]);


        if($dateOfBirth->age < 18)
        {
            info_message("Vous devez être adulte pour pouvoir réserver une annonce");
            return redirect()->back();
        }

        $booking['student_user_id'] = \Auth::id();

        $booking['birthdate'] = implode('/', [$date["dobday"], $date["dobmonth"], $date["dobyear"]]);

        $bookModel = Booking::create($booking);

        Event::fire(new BookingRequestSent($bookModel));

        thanks('Votre demande de cours a été envoyée au professeur avec succès');

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

        thanks("Votre réponse a été envoyée à l'élève avec succès");

        return redirect('/mon-compte');
    }
}