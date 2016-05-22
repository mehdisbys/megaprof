<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AdvertsTableSeeder extends Seeder
{



    public function run()
    {
        $filename = './public/addresses.csv';
        $row = array_map('str_getcsv', file($filename));

        //   \DB::table('adverts')->delete();
        $faker = Faker::create('fr_FR');

        for ($i = 0; $i < 19; $i++) {

            $title       = $faker->sentence(12);
            $subjectId   = $faker->numberBetween(125, 129);
            $subjectName = \App\Models\SubSubject::find($subjectId)->name;

            $advertId = \DB::table('adverts')->insertGetId([
                'user_id'                   => 6,
                'slug'                      => str_slug($title, "-"),
                'title'                     => $subjectName . " - " .$title,
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
                'location_lat'              => $row[$i][3],
                'location_long'             => $row[$i][4],
                'travel_radius'             => 1000,
                'location_postcode'         => $row[$i][2],
                'location_city'             => $row[$i][0],
                'location_country'          => 'MA',
                'location_street'           => $row[$i][1],
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

            \DB::table('subjects_per_advert')->insert([
                    'advert_id'  => $advertId,
                    'subject_id' => $subjectId,
                    'level_ids'  => '["11"]'
                ]
            );
        }
    }
}
