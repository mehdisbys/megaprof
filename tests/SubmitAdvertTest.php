<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;
use App\Models\User;

class SubmitAdvertTest extends TestCase
{
    use DatabaseTransactions;


    public function test_submit_step1Subject()
    {
        $this->loginAsUser();

        $faker = Faker::create();

        // Subjects
        $this->visit("/nouvelle-annonce-1")
            ->see("Quelle(s) matière(s) enseignez-vous ?");

        //TODO Can select multiple adverts within same field
        $subjectId = 79;
        $this->submitForm("J'ai sélectionné les matières de mon annonce", ['subjects' => [$subjectId]]);

        // Title and Levels
        $this->see("Titre de l'annonce et Niveaux");

        //TODO title must be 12 words minimum
        $title = $faker->sentence(12);
        $this->submitForm("Je valide mes choix", ['title' => $title, 'levels' => ['79' => ['9'] ]]);
        $this->seeInDatabase('adverts', ['title' => $title]);
        $advert = \App\Models\Advert::orderBy('id', 'desc')->first();

        // Address and Travel
        $this->see('Lieux des cours et Modalités');
        $this->submitForm("J'ai défini où se dérouleront mes cours", $this->fake_step3AddressAndTravel());

        // Content and Experience
        $this->see('Description et expertise');

        //TODO Form request to make sure there is at least 40 words per section
        $step4 = [
            'presentation' => $faker->sentence(40),
            'content' => $faker->sentence(40),
            'experience' => $faker->sentence(40)
        ];
        $this->submitForm("J'ai défini le contenu de mes cours", $step4);
        $this->seeInDatabase('adverts', $step4);


        // Price And Conditions
        $this->see("Quel est le prix de vos cours ?");
        $this->submitForm("J'ai défini le prix de mes cours", $this->fake_step5PriceAndConditions());

        // Picture
        $this->see("Montrez votre plus beau sourire !");
        $this->submitForm("Valider cette photo", $this->fake_step6Picture());
        $this->seeInDatabase('avatar', ['advert_id' => $advert->id, 'img_name' => 'question-mark-face.jpg' ]);

        // Publishing the advert
        $this->see("Publication de l'annonce");
        $this->submitForm("Publier l'annonce",[]);

        $advert = \App\Models\Advert::orderBy('id', 'desc')->first();

        $this->assertNotNull($advert->published_at);
    }

    public function fake_step3AddressAndTravel()
    {
        $faker = Faker::create();

        return [
            'postcode'      =>  $faker->postcode,
            'country'       =>  $faker->country,
            'address'       =>  $faker->address,
            'longitude'     =>  $faker->longitude,
            'city'          =>  $faker->city,
            'radius'        =>  $faker->randomDigit,
            'latitude'      =>  $faker->latitude,
            'can_receive'   =>  'on',
            'can_travel'    =>  'on',
            'can_webcam'    =>  'on'
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
