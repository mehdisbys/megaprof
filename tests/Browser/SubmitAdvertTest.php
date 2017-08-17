<?php

namespace Tests\Browser;


use App\Models\Advert;
use App\Models\SubjectsPerAdvert;
use Faker\Factory as Faker;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SubmitAdvertTest extends DuskTestCase
{

    public function test_submit_step1Subject()
    {
        $user = User::inRandomOrder()->first();

        $this->browse(function (Browser $browser) use ($user) {
            $faker = Faker::create();
            // Step 1 Subjects
            $browser
                ->loginAs($user)
                ->visit("/nouvelle-annonce-1")
                ->check('#303')
                ->check('#304')
                ->check('#305')
                ->click('#submitStep1');

            $advert = Advert::where(['user_id' => $user->id])->orderBy('created_at', 'desc')->first();

            $this->assertNotNull($advert);

            $this->assertTrue(SubjectsPerAdvert::where(['advert_id' => $advert->id, 'subject_id' => '303'])->exists());
            $this->assertTrue(SubjectsPerAdvert::where(['advert_id' => $advert->id, 'subject_id' => '304'])->exists());
            $this->assertTrue(SubjectsPerAdvert::where(['advert_id' => $advert->id, 'subject_id' => '305'])->exists());

            // Step 2 Title and Levels
            $browser->type('title', $faker->sentence(15))
                    ->click('#toggle_303')
                    ->check('#303_9')
                    ->click('#toggle_304')
                    ->check('#304_10')
                    ->click('#toggle_305')
                    ->check('#305_12')
                    ->click('#submitStep2');

            $this->assertTrue(SubjectsPerAdvert::where(['advert_id' => $advert->id, 'subject_id' => '303', 'level_ids' => json_encode(["9"])])->exists());
            $this->assertTrue(SubjectsPerAdvert::where(['advert_id' => $advert->id, 'subject_id' => '304', 'level_ids' => json_encode(["10"])])->exists());
            $this->assertTrue(SubjectsPerAdvert::where(['advert_id' => $advert->id, 'subject_id' => '305', 'level_ids' => json_encode(["12"])])->exists());

            // Step 3 Location and options

            $browser->type('location', '45 Bd Ghandi, Casablanca, Maroc')
                    ->pause(2000)
                    ->keys('#location', ['{ARROW_DOWN}'])
                    ->keys('#location', ['{ENTER}'])
                    ->check('can_webcam')
                    ->check('can_receive')
                    ->check('can_travel')
                    ->click('#submitStep3')
                    ->pause(1000);

            $advert->refresh();

            $this->assertTrue($advert->location === '45 Boulevard Ghandi, Casablanca, Maroc');
            $this->assertTrue($advert->location_lat === '33.57639179999999');
            $this->assertTrue($advert->location_long === '-7.651909599999954');
            $this->assertTrue($advert->location_city === 'Casablanca');
            $this->assertTrue($advert->location_country === 'Maroc');
            $this->assertTrue($advert->can_receive === 'on');
            $this->assertTrue($advert->can_travel === 'on');
            $this->assertTrue($advert->can_webcam === 'on');

            $browser->type('presentation', $faker->sentence(42))
                    ->type('content', $faker->sentence(42))
                    ->type('experience', $faker->sentence(42))
                    ->click('#submitStep4')
                    ->pause(1000);

            $advert->refresh();

            $this->assertTrue($advert->presentation !== NULL);
            $this->assertTrue($advert->content !== NULL);
            $this->assertTrue($advert->experience !== NULL);

            $browser->type('price', 99)
                    ->click('#submitStep5')
                    ->pause(1000);

            $advert->refresh();

            $this->assertTrue($advert->price === 99);

            $browser->click('#submitStep6')
                    ->assertSee('Votre annonce a été créée avec succès !');

        });

    }
}
