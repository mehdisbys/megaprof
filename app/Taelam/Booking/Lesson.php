<?php

namespace App\Taelam\Booking;

use App\Models\Booking;
use App\Models\User;
use App\Taelam\Booking\Exceptions\TooYoungToBookLessonOnYourOwn;
use App\Events\BookingRequestSent;
use Carbon\Carbon;

class Lesson
{

    public function book (User $student, array $details)
    {
        $dateOfBirth = Carbon::createFromDate($details["dobyear"], $details["dobmonth"], $details["dobday"]);

        if($dateOfBirth->age < 18)
        {
            throw new TooYoungToBookLessonOnYourOwn();
        }

        $details['birthdate'] = implode('/', [$details["dobday"], $details["dobmonth"], $details["dobyear"]]);

        $detailsA = array_only($details, ['prof_user_id', 'advert_id', 'presentation', 'date', 'location', 'client', 'mobile', 'addresse', 'pick_a_date', 'pick_a_location', 'birthdate']);

        $bookModel = Booking::create($detailsA + ['student_user_id' => $student->id]);

        event(new BookingRequestSent($bookModel));
    }

}