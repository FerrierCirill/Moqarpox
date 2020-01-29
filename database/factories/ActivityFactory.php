<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name'           => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'price'          => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000),
        'description'    => $faker->text($maxNbChars = 250),
        'resume'         => $faker->paragraph($nbSentences = 7, $variableNbSentences = true),
        'information'    => $faker->paragraph($nbSentences = 7, $variableNbSentences = true),
        'state'          => $faker->randomElement($array = array ('valider','activer','refuser', 'désactiver')),
        'subCategory_id' => $faker->numberBetween($min = 1, $max = 20),
        'compagny_id'    => $faker->numberBetween($min = 1, $max = 1000)
    ];
});
