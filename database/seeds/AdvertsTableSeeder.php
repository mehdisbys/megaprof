<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AdvertsTableSeeder extends Seeder
{
    const NUMBER_OF_ADVERTS_TO_CREATE = 100;


    public function run()
    {
        $filename = './public/addresses.csv';
        $row = array_map('str_getcsv', file($filename));

       //   \DB::table('adverts')->delete();
        $faker = Faker::create('fr_FR');

        $userIds = array_pluck(\App\Models\User::all(['id'])->toArray(), 'id');

        for ($i = 0; $i < self::NUMBER_OF_ADVERTS_TO_CREATE; $i++) {

            $title       = $faker->sentence(12);
            $subjectId   = $faker->numberBetween(79, 200);
            $subjectName = \App\Models\SubSubject::find($subjectId)->name;

            $addressIndex = random_int(0,19);

            $advertId = \DB::table('adverts')->insertGetId([
                'user_id'                   => $faker->randomElement($userIds) ,
                'slug'                      => str_slug($title, "-"),
                'title'                     => $subjectName . " - " .$title,
                'presentation'              => $faker->words(20, true),
                'content'                   => $faker->words(20, true),
                'experience'                => $faker->words(20, true),
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
                'location_lat'              => $row[$addressIndex][3],
                'location_long'             => $row[$addressIndex][4],
                'travel_radius'             => 1000,
                'location_postcode'         => $row[$addressIndex][2],
                'location_city'             => $row[$addressIndex][0],
                'location_country'          => 'MA',
                'location_street'           => $row[$addressIndex][1],
                'location_house_number'     => NULL,
                'location_more_details'     => NULL,
                'can_receive'               => $faker->randomKey(['on', 'off']),
                'can_travel'                => $faker->randomKey(['on', 'off']),
                'can_webcam'                => $faker->randomKey(['on', 'off']),
                'marketing_video'           => NULL,
                'published_at'              => $faker->dateTime,
                'created_at'                => $faker->dateTime,
                'updated_at'                => $faker->dateTime,
                'approved_at'               => $faker->dateTime,
                'deleted_at'                => NULL,
            ]);

            \DB::table('subjects_per_advert')->insert([
                    'advert_id'  => $advertId,
                    'subject_id' => $subjectId,
                    'level_ids'  => '["11"]'
                ]
            );
        }

        echo "Created " . self::NUMBER_OF_ADVERTS_TO_CREATE . " adverts" . PHP_EOL;
    }
}
