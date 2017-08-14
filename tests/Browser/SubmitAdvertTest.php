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
                    ->assertSee('Votre annonce a été créée avec succès !')
                    ->pause(8000);

        });


        // Title and Levels
//        $this->see("Titre de l'annonce et Niveaux");
//
//        //TODO title must be 12 words minimum
//        $title = $faker->sentence(12);
//        $this->submitForm("Je valide mes choix", ['title' => $title, 'levels' => ['79' => ['9'] ]]);
//        $this->seeInDatabase('adverts', ['title' => $title]);
//        $advert = \App\Models\Advert::orderBy('id', 'desc')->first();
//
//        // Address and Travel
//        $this->see('Lieux des cours et Modalités');
//        $this->submitForm("J'ai défini où se dérouleront mes cours", $this->fake_step3AddressAndTravel());
//
//        // Content and Experience
//        $this->see('Description et expertise');
//
//        //TODO Form request to make sure there is at least 40 words per section
//        $step4 = [
//            'presentation' => $faker->sentence(40),
//            'content' => $faker->sentence(40),
//            'experience' => $faker->sentence(40)
//        ];
//        $this->submitForm("J'ai défini le contenu de mes cours", $step4);
//        $this->seeInDatabase('adverts', $step4);
//
//
//        // Price And Conditions
//        $this->see("Quel est le prix de vos cours ?");
//        $this->submitForm("J'ai défini le prix de mes cours", $this->fake_step5PriceAndConditions());
//
//        // Picture
//        $this->see("Montrez votre plus beau sourire !");
//        $this->submitForm("Valider cette photo", $this->fake_step6Picture());
//        $this->seeInDatabase('avatar', ['advert_id' => $advert->id, 'img_name' => 'question-mark-face.jpg' ]);
//
//        // Publishing the advert
//        $this->see("Publication de l'annonce");
//        $this->submitForm("Publier l'annonce",[]);
//
//        $advert = \App\Models\Advert::orderBy('id', 'desc')->first();
//
//        $this->assertNotNull($advert->published_at);
    }

    public function fake_step3AddressAndTravel()
    {
        $faker = Faker::create();

        return [
            'postcode'    => $faker->postcode,
            'country'     => $faker->country,
            'address'     => $faker->address,
            'longitude'   => $faker->longitude,
            'city'        => $faker->city,
            'radius'      => $faker->randomDigit,
            'latitude'    => $faker->latitude,
            'can_receive' => 'on',
            'can_travel'  => 'on',
            'can_webcam'  => 'on'
        ];
    }

    public function fake_step5PriceAndConditions()
    {
        $faker = Faker::create();

        $price                  = $faker->numberBetween(10, 500);
        $travel_percent         = $faker->numberBetween(0, 25);
        $webcam_percent         = $faker->numberBetween(0, 25);
        $price_5_hours_percent  = $faker->numberBetween(0, 25);
        $price_10_hours_percent = $faker->numberBetween(0, 25);

        return [
            "price"                     => $price,
            "price_travel_percentage"   => $travel_percent,
            "price_travel"              => $price - (($price * $travel_percent) / 100),
            "price_webcam_percentage"   => $webcam_percent,
            "price_webcam"              => $price - (($price * $webcam_percent) / 100),
            "price_5_hours_percentage"  => $price_5_hours_percent,
            "price_10_hours_percentage" => $price_10_hours_percent,
            "price_5_hours"             => $price - (($price * $price_5_hours_percent) / 100),
            "price_10_hours"            => $price - (($price * $price_10_hours_percent) / 100),
            "price_more"                => $faker->sentence(20)
        ];
    }

    public function fake_step6Picture()
    {
        $avatar = base_path() . '/public/images/question-mark-face.jpg';
        return [
            'img_upload' => prepareFileUpload($avatar),
            'w'          => 200,
            'h'          => 200,
            'x'          => 50,
            'y'          => 50,
            'r'          => 0
        ];

    }

    public function loginAsUser(\App\Models\User $usr = null)
    {
        $user = $usr ?? User::first();

        \Auth::login($user);

        return $user;
    }
}
