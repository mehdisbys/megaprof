<?php
namespace Tests;


use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Laravel\Dusk\Browser;

class BookCourseTest extends DuskTestCase
{
    use DatabaseTransactions;

    private $prof;

    private $booking;


    /** @test */
    public function test_book_course()
    {
        $advert = $this->exampleAdvert();

        $this->prof = $advert->prof;
        $faker = Faker::create();

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

//    /** @test
//     *
//     * @depends test_book_course
//     */
//    public function test_accept_course_booking_request($booking)
//    {
//        //Fucking laravel..
//        $booking = \App\Models\Booking::create($booking->toArray());
//
//        $this->loginAsUser($this->prof);
//
//        $this->visit("/mon-compte")
//            ->see("Mes demandes de cours");
//
//        $this->visit("/demande/{$booking->id}/yes");
//
//        $id = $booking->id;
//
//        $this->booking = \App\Models\Booking::find($id);
//
//        $this->assertNotNull($this->booking, "Booking model with ID $id wasnt found");
//
//        $this->assertEquals('yes', $this->booking->answer);
//
//    }
//
//    /** @test
//     *
//     * @depends test_book_course
//     */
//    public function test_reject_course_booking_request($booking)
//    {
//        //Fucking laravel..
//        $booking = \App\Models\Booking::create($booking->toArray());
//
//        $this->loginAsUser($this->prof);
//
//        $this->visit("/mon-compte")
//            ->see("Mes demandes de cours");
//
//        $this->visit("/demande/{$booking->id}/no");
//
//        $this->booking = \App\Models\Booking::find($booking->id);
//
//        $this->assertNotNull($this->booking);
//
//        $this->assertEquals('no', $this->booking->answer);
//    }


    public function exampleAdvert()
    {
        return \App\Models\Advert::liveAdverts()->first();
    }

    public function loginAsUser(User $usr = null)
    {
        $user = $usr ?? User::first();

        Auth::loginUsingId($user->id);

        return $user;
    }

}
