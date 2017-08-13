<?php

namespace Tests;


use App\Models\Booking;
use App\Models\User;
use Faker\Factory as Faker;
use Laravel\Dusk\Browser;

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

        $this->booking = \App\Models\Booking::where(['presentation' => $presentation])->get();
        $this->assertNotNull($this->booking);

        return $this->booking->first();
    }

    public function test_accept_course_booking_request()
    {
        $advert  = $this->exampleAdvert();
        $details = $this->fakeBookingForm($advert);
        $booking = Booking::create($details + ['student_user_id' => User::inRandomOrder()->first()->id]);

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
        $booking = Booking::create($details + ['student_user_id' => User::inRandomOrder()->first()->id]);


        $this->browse(function (Browser $browser) use ($advert, $booking) {
            $browser
                ->loginAs($advert->user)
                ->visit("/demande/{$booking->id}/no");
        });

        $booking->refresh();

        $this->assertEquals('no', $booking->answer);
    }

    private function fakeBookingForm(\App\Models\Advert $advert)
    {
        $faker = Faker::create();

        return
            [
                'advert_id'    => $advert->id,
                'prof_user_id' => $advert->user->id,
                'subject_id' => 39,
                'presentation' => $faker->paragraph,
                'date'         => 'this_week',
                'location'     => 'any',
                'client'       => 'myself',
                'gender'       => 'man',
                'mobile'       => '0623435324',
                'birthdate'    => '06/12/1984',
                'addresse'     => '131 Victoria Street, Londres, Royaume-Uni',
            ];
    }

    private function exampleAdvert()
    {
        return \App\Models\Advert::liveAdverts()->first();
    }

}
