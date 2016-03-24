<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Faker\Factory as Faker;

class BookCourseTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    private $prof;

    private $booking;

    function __construct()
    {
        parent::setUp();
    }


    /** @test */
    public function test_book_course()
    {
        //$this->expectsEvents([\App\Events\BookingRequestSent::class]);

        $advert = $this->exampleAdvert();

        $this->prof = $advert->prof;

        $bookingForm = $this->fakebookingform($advert);

        $this->loginAsUser();

        $this->visit("/$advert->slug")
            ->see('réserver un cours')
            ->click('Réserver un cours')
            ->see('dites-en un peu plus à')
            ->submitForm('Envoyer ma demande', $bookingForm);

        $this->booking = \App\Models\Booking::where(['presentation' => $bookingForm['presentation']])->get();
        $this->assertNotNull($this->booking);

        $this->see('tableau de bord');
        return $this->booking->first();
    }

    /** @test
     *
     * @depends test_book_course
     */
    public function test_accept_course_booking_request($booking)
    {
        $this->loginAsUser($this->prof);

        $this->visit("/mon-compte")
             ->see("Mes demandes de cours");

        $this->visit("/demande/{$booking->id}/yes");

        $this->booking = \App\Models\Booking::find($booking->id);

        $this->assertNotNull($this->booking);

        $this->assertEquals('yes', $this->booking->answer);

    }

    /** @test
     *
     * @depends test_book_course
     */
    public function test_reject_course_booking_request($booking)
    {
        $this->loginAsUser($this->prof);

        $this->visit("/mon-compte")
            ->see("Mes demandes de cours");

        $this->visit("/demande/{$booking->id}/no");

        $this->booking = \App\Models\Booking::find($booking->id);

        $this->assertNotNull($this->booking);

        $this->assertEquals('no', $this->booking->answer);
    }

    public function fakeBookingForm(\App\Models\Advert $advert)
    {
        $faker = Faker::create();

        return
            [
                'advert_id' => $advert->id,
                'prof_user_id' => $advert->user->id,
                'presentation' => $faker->paragraph,
                'date' => 'this_week',
                'location' => 'any',
                'client' => 'myself',
                'gender' => 'man',
                'mobile' => '0623435324',
                'birthdate' => '06/12/1984',
                'addresse' => '131 Victoria Street, Londres, Royaume-Uni'
            ];
    }

    public function exampleAdvert()
    {
        return \App\Models\Advert::liveAdverts()->first();
    }

    public function loginAsUser(User $usr = null)
    {
        $user = $usr ?? User::first();

        \Auth::login($user);

        return $user;
    }

}
