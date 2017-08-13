<?php

namespace Tests\Browser;

use App\Models\Booking;
use App\Models\User;
use App\Taelam\Booking\Lesson;
use App\Taelam\Booking\LessonDetails;
use Faker\Factory as Faker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BookCourseTest extends DuskTestCase
{
    private $prof;
    private $booking;

    public function test_book_course()
    {
        $advert     = $this->exampleAdvert();
        $this->prof = $advert->prof;
        $faker      = Faker::create();

        $presentation = $faker->paragraph;
        $this->browse(function (Browser $browser) use ($advert, $presentation) {
            $browser
                ->loginAs(User::first()->id)
                ->visit("/$advert->slug")
                ->assertSee('Réserver')
                ->click('.booking-button')
                ->assertSee('Dites-en un peu plus à')
                ->visit("/mise-en-relation/$advert->slug/testing")
                ->type('presentation', $presentation);
            $browser->driver->executeScript('window.scrollTo(0, 500);');

            $browser->radio('date', 'this_week')
                    ->radio('location', 'any')
                    ->radio('client', 'myself');
            $browser->driver->executeScript('window.scrollTo(0, 1000);');

            $browser->radio('gender', 'man')
                    ->type('mobile', '0623435324')
                    ->select('dobday', '06')
                    ->select('dobmonth', '06')
                    ->select('dobyear', '1984')
                    ->type('addresse', '131 Victoria Street, Londres, Royaume-Uni')
                    ->click('#submitForm')
                    ->assertSee('Votre demande de cours a été envoyée au professeur avec succès');
        });

        $this->booking = Booking::where(['presentation' => $presentation])->get();
        $this->assertNotNull($this->booking);

        return $this->booking->first();
    }

    public function test_accept_course_booking_request()
    {
        $advert  = $this->exampleAdvert();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $booking = $lesson->book(User::inRandomOrder()->first(), $details);

        $this->browse(function (Browser $browser) use ($advert, $booking) {
            $browser
                ->loginAs($advert->user)
                ->visit("/demande/{$booking->id}/yes");
        });

        $booking->refresh();

        $this->assertEquals('yes', $booking->answer);

    }

    public function test_reject_course_booking_request()
    {
        $advert  = $this->exampleAdvert();
        $details = $this->fakeBookingForm($advert);
        $lesson  = new Lesson();
        $booking = $lesson->book(User::inRandomOrder()->first(), $details);


        $this->browse(function (Browser $browser) use ($advert, $booking) {
            $browser
                ->loginAs($advert->user)
                ->visit("/demande/{$booking->id}/no");
        });

        $booking->refresh();

        $this->assertEquals('no', $booking->answer);
    }

    //TODO
    //public function test_accepted_booking_cannot_be_modified(){}
    //TODO
    //public function test_rejected_booking_cannot_be_modified(){}

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

    private function exampleAdvert()
    {
        return \App\Models\Advert::liveAdverts()->first();
    }

}
