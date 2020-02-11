<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {
    $chose = $faker->numberBetween($min = 0, $max = 1) == 0;
    $to    = ($chose) ? 'company_id'   : 'activity_id';
    $maxID = ($chose) ? 1000            : 5000;
    return [
        'link' => $faker->imageUrl($width=1080, $height=720, 'transport'),
        $to    => $faker->numberBetween($min = 1, $maxID)
    ];
});
