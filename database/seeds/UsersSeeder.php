<?php

use Illuminate\Database\Seeder;
use App\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 1000; $i++) {
            $user = new User;

            $gender = [null, 'male', 'female'];

            $user->first_name        = firstName($gender[$i%3]);
            $user->second_name       = lastName();
            $user->phone             = $faker->e164PhoneNumber();
            $user->email             = $faker->email();
            $user->email_verified_at = ($i%50 == 0)? null : DateTime::getTimestamp();
            $user->password          = $faker->password();
            $user->civility          = title($gender[$i%3]);
        }
    }
}
