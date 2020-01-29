<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Compagny;
use Faker\Generator as Faker;

$factory->define(Compagny::class, function (Faker $faker) {
    return [
        'name'    => $faker->company(),
        'phone'   => $faker->e164PhoneNumber(),
        'email'   => $faker->email(),
        'siret'   => $faker->iban($countryCode = 'FR'),
        'rib'     => $faker->iban($countryCode = 'FR'),
        'adress1' => $faker->streetAddress(),
        'adress2' => $faker->streetSuffix,
        'lat'     => $faker->latitude($min = -90, $max = 90),
        'lng'     => $faker->longitude($min = -180, $max = 180),
        'user_id' => $faker->numberBetween($min = 1, $max = 300),
        'city_id' => $faker->postcode()
    ];
});
