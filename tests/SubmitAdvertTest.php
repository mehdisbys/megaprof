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

        // Address and Travel
    }



    public function fake_step1Subject()
    {

    }

    public function loginAsUser(\App\Models\User $usr = null)
    {
        $user = $usr ?? User::first();

        \Auth::login($user);

        return $user;
    }
}
