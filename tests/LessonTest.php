<?php


namespace Tests;

use App\Models\Advert;
use App\Models\User;
use App\Taelam\Booking\Exceptions\ProfCannotBookOwnLesson;
use App\Taelam\Booking\Exceptions\TooYoungToBookLessonOnYourOwn;
use App\Taelam\Booking\Lesson;
use Faker\Factory as Faker;


use Illuminate\Foundation\Testing\DatabaseTransactions;

class LessonTest extends TestCase
{
    use DatabaseTransactions;

    public function testProfCannotBookOwnAdvert()
    {
        $this->expectException(ProfCannotBookOwnLesson::class);

        $advert  = Advert::inRandomOrder()->first();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $lesson->book($advert->user, $details);
    }

    public function test_under_18_cannot_book_lesson()
    {
        $this->expectException(TooYoungToBookLessonOnYourOwn::class);

        $advert  = Advert::inRandomOrder()->first();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $details['dobyear'] = date('Y') - 17;
        $student = User::inRandomOrder()->where('id', '<>', $advert->user->id)->first();
        $lesson->book( $student, $details);
    }


    private function fakeBookingForm(\App\Models\Advert $advert)
    {
        $faker = Faker::create();

        return
            [
                'advert_id'    => $advert->id,
                'prof_user_id' => $advert->user->id,
                'subject_id'   => 39,
                'presentation' => $faker->paragraph,
                'date'         => 'this_week',
                'location'     => 'any',
                'client'       => 'myself',
                'gender'       => 'man',
                'mobile'       => '0623435324',
                'dobday'       => '06',
                'dobmonth'     => '12',
                'dobyear'      => '1984',
                'addresse'     => '131 Victoria Street, Londres, Royaume-Uni',
            ];
    }



}