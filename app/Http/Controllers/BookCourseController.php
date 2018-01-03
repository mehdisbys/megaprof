<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookLesson;
use App\Http\Requests\BookLessonUnregistered;
use App\Models\Advert;
use App\Taelam\Booking\Exceptions\AdvertNotFound;
use App\Taelam\Booking\Exceptions\BookingNotFound;
use App\Taelam\Booking\Exceptions\BookingRequestAlreadyHasAReply;
use App\Taelam\Booking\Exceptions\CaptaIncorrect;
use App\Taelam\Booking\Exceptions\InvalidReplyToBookingRequest;
use App\Taelam\Booking\Exceptions\StudentNotFound;
use App\Taelam\Booking\Exceptions\TooYoungToBookLessonOnYourOwn;
use App\Taelam\Booking\Lesson;
use App\Taelam\Booking\LessonDetails;
use Illuminate\Support\Facades\Auth;


class BookCourseController extends Controller
{
    public function bookLesson($slug, $testing = false)
    {
        if ($testing) $testing = true;

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

            if (Advert::find($request->get('advert_id')) == null)
                throw new AdvertNotFound();

            $lesson->book($student, LessonDetails::fromArray($request->all()));
        } catch (AdvertNotFound $e) {
            info_message("Une erreur est survenue, veuillez réessayer plus tard");
            return redirect()->back();
        } catch (StudentNotFound $e) {
            info_message("Vous devez être connecté pour pouvoir réserver une annonce");
            return redirect()->back();
        } catch (TooYoungToBookLessonOnYourOwn $e) {
            info_message("Vous devez être adulte pour pouvoir réserver une annonce");
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTraceAsString());
            info_message("Une erreur est survenue, veuillez réessayer plus tard");
            return redirect()->back();
        }

        thanks('Votre demande de cours a été envoyée au professeur avec succès');

        return redirect('/mon-compte');
    }

    public function postBookLessonUnregistered(BookLessonUnregistered $request)
    {
        $student = NULL;

        try {
            if (isCaptchaCodeCorrect($request->get('g-recaptcha-response')) == false) {
                throw new CaptaIncorrect();
            }

            if (Advert::find($request->get('advert_id')) == null)
                throw new AdvertNotFound();

            $lesson = new Lesson();
            $guest  = new \App\Taelam\Users\User();

            $student = $guest->register(
                $request->get('firstname'),
                $request->get('lastname', ''),
                $request->get('email'),
                $request->get('password')
            );

            if ($student == null)
                throw new StudentNotFound();

            $lesson->book($student, LessonDetails::fromArray($request->all()));
        } catch (AdvertNotFound $e) {
            info_message("Une erreur est survenue, veuillez réessayer plus tard");
            return redirect()->back();
        } catch (StudentNotFound $e) {
            info_message("Vous devez être connecté pour pouvoir réserver une annonce");
            return redirect()->back();
        } catch (TooYoungToBookLessonOnYourOwn $e) {
            info_message("Vous devez être adulte pour pouvoir réserver une annonce");
            return redirect()->back();
        } catch (CaptaIncorrect $e) {
            error("Veuillez cliquer sur \"Je ne suis pas un robot\" ");
            return redirect()->back();
        } catch (\Exception $e) {
            info_message("Une erreur est survenue, veuillez réessayer plus tard");
            return redirect()->back();
        }
        thanks('Votre demande de cours a été envoyée au professeur avec succès');

        Auth::login($student);

        return redirect('/mon-compte');
    }


    public function replyBookingRequest($booking_id, $answer)
    {
        $lesson = new Lesson();

        try {
            $lesson->teacherReply($booking_id, $answer);
        } catch (BookingNotFound $e) {
            error("Cette demande de cours n'existe pas");
            return redirect()->back();
        } catch (BookingRequestAlreadyHasAReply $e) {
            error("Vous avez déjà répondu à cette demande");
            return redirect()->back();
        } catch (InvalidReplyToBookingRequest $e) {
            error("Réponse à la demande de cours invalide");
            return redirect()->back();
        }

        thanks("Votre réponse a été envoyée à l'élève avec succès");
        return redirect('/mon-compte');
    }
}