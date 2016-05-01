<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AdvertsTableSeeder extends Seeder
{

    public function run()
    {
        //   \DB::table('adverts')->delete();
        $faker = Faker::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {

            $title = $faker->sentence(12);

            \DB::table('adverts')->insert([
                    'user_id'                   => 6,
                    'slug'                      => str_slug($title, "-"),
                    'title'                     => $title,
                    'presentation'              => $faker->paragraph(15),
                    'content'                   => $faker->paragraph(15),
                    'experience'                => $faker->paragraph(15),
                    'price'                     => $faker->numberBetween(90, 750),
                    'price_travel_percentage'   => $faker->numberBetween(0, 10),
                    'price_travel'              => $faker->numberBetween(90, 150),
                    'price_5_hours_percentage'  => $faker->numberBetween(0, 10),
                    'price_5_hours'             => $faker->numberBetween(90, 750),
                    'price_10_hours_percentage' => $faker->numberBetween(10, 20),
                    'price_10_hours'            => $faker->numberBetween(1000, 2500),
                    'price_webcam_percentage'   => $faker->numberBetween(10, 20),
                    'price_webcam'              => $faker->numberBetween(300, 700),
                    'price_more'                => '',
                    'location'                  => '',
                    'location_lat'              => $faker->latitude(48,51),
                    'location_long'             => $faker->longitude(2,5),
                    'travel_radius'             => 1000,
                    'location_postcode'         => $faker->postcode,
                    'location_city'             => $faker->city,
                    'location_country'          => $faker->countryCode,
                    'location_street'           => $faker->streetAddress,
                    'location_house_number'     => NULL,
                    'location_more_details'     => NULL,
                    'can_receive'               => $faker->randomKey(['on', 'off']),
                    'can_travel'                => $faker->randomKey(['on', 'off']),
                    'can_webcam'                => $faker->randomKey(['on', 'off']),
                    'marketing_video'           => NULL,
                    'published_at'              => $faker->dateTime,
                    'currently_online'          => NULL,
                    'created_at'                => $faker->dateTime,
                    'updated_at'                => $faker->dateTime,
                    'deleted_at'                => NULL,
                ]);
        }
    }
}
