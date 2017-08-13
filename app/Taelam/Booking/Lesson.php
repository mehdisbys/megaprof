<?php

namespace App\Taelam\Booking;

use App\Models\Booking;
use App\Models\User;
use App\Taelam\Booking\Exceptions\ProfCannotBookOwnLesson;
use App\Taelam\Booking\Exceptions\TooYoungToBookLessonOnYourOwn;
use App\Events\BookingRequestSent;

class Lesson
{

    public function book (User $student, LessonDetails $details) : Booking
    {
        if($student->id === $details->getProfUserId() )
        {
            throw new ProfCannotBookOwnLesson();
        }

        if($details->getStudentAge() < 18)
        {
            throw new TooYoungToBookLessonOnYourOwn();
        }

        $bookModel = Booking::create($details->toArray() + ['student_user_id' => $student->id]);

        event(new BookingRequestSent($bookModel));

        return $bookModel;
    }

}