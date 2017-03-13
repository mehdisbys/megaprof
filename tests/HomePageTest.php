<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/')
            ->see('Taelam')
            ->see('se connecter')
            ->see('créer une annonce')
            ->see("s'inscrire");
    }
}
