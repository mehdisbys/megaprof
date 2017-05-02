<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SubjectsTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(SubLevelsTableSeeder::class);

        if(env('APP_ENV') == 'local') {
            $this->call(UserTableSeeder::class);
            $this->call(AvatarTableSeeder::class);
            $this->call(AdvertsTableSeeder::class);
        }
    }
}
