<?php


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UserTableSeeder extends Seeder
{
    const NUMBER_OF_USERS_TO_CREATE = 75;

    public function run()
    {
        $faker = Faker::create('fr_FR');

        $gender = ['man', 'woman'];

        for ($i = 0; $i < self::NUMBER_OF_USERS_TO_CREATE; $i++) {

            \DB::table('users')->insertGetId(
                [
                    'firstname'  => $faker->firstName,
                    'lastname'   => $faker->lastName,
                    'email'      => $faker->email,
                    'telephone'  => $faker->phoneNumber,
                    'gender'     => $gender[random_int(0,1)],
                    'birthdate'  => $faker->dateTimeBetween('-60 years', '-18 years'),
                    'password'   => '',
                    'confirmed'  => 1,
                ]);

        }
    }


}