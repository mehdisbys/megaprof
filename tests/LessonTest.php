<?php


namespace Tests;

use App\Events\BookingRequestReply;
use App\Events\BookingRequestSent;
use App\Models\Advert;
use App\Models\User;
use App\Taelam\Booking\Exceptions\BookingNotFound;
use App\Taelam\Booking\Exceptions\BookingRequestAlreadyHasAReply;
use App\Taelam\Booking\Exceptions\InvalidReplyToBookingRequest;
use App\Taelam\Booking\Exceptions\ProfCannotBookOwnLesson;
use App\Taelam\Booking\Exceptions\TooYoungToBookLessonOnYourOwn;
use App\Taelam\Booking\Lesson;
use App\Taelam\Booking\LessonDetails;
use Faker\Factory as Faker;


use Illuminate\Foundation\Testing\DatabaseTransactions;

class LessonTest extends TestCase
{
    use DatabaseTransactions;

    public function testCanBookLesson()
    {
        $this->expectsEvents(BookingRequestSent::class);

        $advert  = Advert::inRandomOrder()->first();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $student = User::inRandomOrder()->where('id', '<>', $advert->user->id)->first();
        $lesson->book($student, $details);
    }

    public function testProfCannotBookOwnAdvert()
    {
        $this->expectException(ProfCannotBookOwnLesson::class);

        $advert  = Advert::inRandomOrder()->first();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $lesson->book($advert->user, $details);
    }

    public function testUnder18CannotBookLesson()
    {
        $this->expectException(TooYoungToBookLessonOnYourOwn::class);

        $advert  = Advert::inRandomOrder()->first();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $student = User::inRandomOrder()->where('id', '<>', $advert->user->id)->first();
        $details->setDobYear(date('Y') - 17);
        $lesson->book($student, $details);
    }

    public function testCanAcceptBookingRequest()
    {
        $this->expectsEvents(BookingRequestReply::class);

        $advert  = Advert::inRandomOrder()->first();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $student = User::inRandomOrder()->where('id', '<>', $advert->user->id)->first();
        $booking = $lesson->book($student, $details);

        $lesson->teacherReply($booking->id, Lesson::ACCEPT, $advert->user->id);
    }

    public function testCanRejectBookingRequest()
    {
        $this->expectsEvents(BookingRequestReply::class);

        $advert  = Advert::inRandomOrder()->first();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $student = User::inRandomOrder()->where('id', '<>', $advert->user->id)->first();
        $booking = $lesson->book($student, $details);

        $lesson->teacherReply($booking->id, Lesson::REJECT, $advert->user->id);
    }

    public function testCannotReplyBookingRequestThatDoesntExist()
    {
        $this->expectException(BookingNotFound::class);
        $advert  = Advert::inRandomOrder()->first();
        $lesson  = new Lesson();
        $lesson->teacherReply(99999, Lesson::REJECT, $advert->user->id);
    }

    public function testCannotReplyBookingRequestThatHasAReplyAlready()
    {
        $this->expectException(BookingRequestAlreadyHasAReply::class);

        $advert  = Advert::inRandomOrder()->first();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $student = User::inRandomOrder()->where('id', '<>', $advert->user->id)->first();
        $booking = $lesson->book($student, $details);

        $lesson->teacherReply($booking->id, Lesson::REJECT, $advert->user->id);
        $lesson->teacherReply($booking->id, Lesson::REJECT, $advert->user->id);
    }

    public function testCannotReplyBookingRequestWithInvalidAnswer()
    {
        $this->expectException(InvalidReplyToBookingRequest::class);

        $advert  = Advert::inRandomOrder()->first();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $student = User::inRandomOrder()->where('id', '<>', $advert->user->id)->first();
        $booking = $lesson->book($student, $details);

        $lesson->teacherReply($booking->id, 'maybe', $advert->user->id);
    }


    private function fakeBookingForm(\App\Models\Advert $advert)
    {
        $faker = Faker::create();

        return LessonDetails::fromArray(
            [
                'advert_id'       => $advert->id,
                'prof_user_id'    => $advert->user->id,
                'subject_id'      => 39,
                'presentation'    => $faker->paragraph,
                'date'            => 'this_week',
                'location'        => 'any',
                'client'          => 'myself',
                'gender'          => 'man',
                'mobile'          => '0623435324',
                'dobday'          => '06',
                'dobmonth'        => '12',
                'dobyear'         => '1984',
                'addresse'        => '131 Victoria Street, Londres, Royaume-Uni',
                'pick_a_date'     => null,
                'pick_a_location' => null,
            ]);
    }


}