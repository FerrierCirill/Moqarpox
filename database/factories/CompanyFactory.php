<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name'    => $faker->company(),
        'phone'   => $faker->e164PhoneNumber(),
        'email'   => $faker->email(),
        'siret'   => $faker->iban($countryCode = 'FR'),
        'rib'     => $faker->iban($countryCode = 'FR'),
        'adress1' => $faker->streetAddress(),
        'adress2' => $faker->streetSuffix,
        'lat'     => $faker->latitude($min = 43.6225, $max = 49.2913),
        'lng'     => $faker->longitude($min = -1.0361, $max = 6.7587),
        'user_id' => $faker->numberBetween($min = 1, $max = 300),
        'city_id' => $faker->postcode()
    ];
});
