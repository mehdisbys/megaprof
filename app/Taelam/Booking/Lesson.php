<?php

namespace App\Taelam\Booking;

use App\Events\BookingRequestReply;
use App\Models\Booking;
use App\Models\User;
use App\Taelam\Booking\Exceptions\BookingNotFound;
use App\Taelam\Booking\Exceptions\BookingRequestAlreadyHasAReply;
use App\Taelam\Booking\Exceptions\InvalidReplyToBookingRequest;
use App\Taelam\Booking\Exceptions\ProfCannotBookOwnLesson;
use App\Taelam\Booking\Exceptions\TooYoungToBookLessonOnYourOwn;
use App\Events\BookingRequestSent;

class Lesson
{
    const ACCEPT = 'yes';
    const REJECT = 'no';

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

    public function teacherReply(int $bookingId, string $answer, int $teacherId = null)
    {
        $booking = Booking::bookingExists($bookingId, $teacherId);

        if ($booking == null) {
            throw new BookingNotFound();
        }

        if($booking->answer != NULL)
        {
           throw new BookingRequestAlreadyHasAReply();
        }

        if(in_array($answer, ['yes', 'no']) == false)
        {
            throw new InvalidReplyToBookingRequest();
        }

        $booking->answer = $answer;
        $booking->save();

        event(new BookingRequestReply($booking));
    }

}