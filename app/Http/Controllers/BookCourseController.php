<?php
namespace App\Http\Controllers;

use App\Events\BookingRequestReply;
use App\Http\Requests\BookLesson;
use App\Models\Advert;
use App\Models\Booking;
use App\Taelam\Booking\Exceptions\AdvertNotFound;
use App\Taelam\Booking\Exceptions\StudentNotFound;
use App\Taelam\Booking\Exceptions\TooYoungToBookLessonOnYourOwn;
use App\Taelam\Booking\Lesson;
use App\Taelam\Booking\LessonDetails;
use Illuminate\Support\Facades\Event;


class BookCourseController extends Controller
{
    public function bookLesson($slug, $testing = false)
    {
        if($testing) $testing = true; ;

        $advert = Advert::findBySlugOr404($slug);

        return view('main.bookLesson')->with(compact('advert', 'testing'));
    }

    public function postBookLesson(BookLesson $request)
    {
        $lesson = new Lesson();

        try {
            $student = \Auth::user();
            if ($student == null)
                throw new StudentNotFound();

            if(Advert::find($request->get('advert_id')) == null)
                throw new AdvertNotFound();

            $lesson->book($student, LessonDetails::fromArray($request->all()));
        }
        catch (AdvertNotFound $e) {
            info_message("Une erreur est survenue, veuillez réessayer plus tard");
            return redirect()->back();
        }
        catch (StudentNotFound $e) {
            info_message("Vous devez être connecté pour pouvoir réserver une annonce");
            return redirect()->back();
        }
        catch (TooYoungToBookLessonOnYourOwn $e) {
            info_message("Vous devez être adulte pour pouvoir réserver une annonce");
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            info_message("Une erreur est survenue, veuillez réessayer plus tard");
            return redirect()->back();
        }

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