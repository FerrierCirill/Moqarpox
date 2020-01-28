<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 5000; $i++) {
            $activity = new Activity;

            $activity->name           = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $activity->price          = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000);
            $activity->description    = $faker->text($maxNbChars = 250);
            $activity->resume         = $faker->paragraph($nbSentences = 7, $variableNbSentences = true);
            $activity->information    = $faker->paragraph($nbSentences = 7, $variableNbSentences = true);
            $activity->state          = $faker->randomElement($array = array ('valider','activer','refuser', 'désactiver'));
            $activity->subCategory_id = $faker->numberBetween($min = 1, $max = 20);
            $activity->compagny_id    = $faker->numberBetween($min = 1, $max = 1000);
        }
    }
}
