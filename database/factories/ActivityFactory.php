<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name'              => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'price'             => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000),
        'description'       => $faker->text($maxNbChars = 200),
        'description_perso' => $faker->text(20),
        'resume'            => $faker->paragraph($nbSentences = 7, $variableNbSentences = true),
        'information'       => $faker->paragraph($nbSentences = 7, $variableNbSentences = true),
        'state'             => $faker->numberBetween($min = -1, $max = 1),
        'sub_category_id'    => $faker->numberBetween($min = 1, $max = 20),
        'company_id'        => $faker->numberBetween($min = 1, $max = 1000),
        'note'              => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
        'link0' => 'https://picsum.photos/1080/720',
        'link1' => 'https://picsum.photos/1080/720',
        'link2' => 'https://picsum.photos/1080/720',
    ];
});
