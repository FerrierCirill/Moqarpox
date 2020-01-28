<?php

use Illuminate\Database\Seeder;
use App\Compagny;

class CompagniesTableSeeder extends Seeder
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
            $compagny = new Compagny;

            $compagny->name    = $faker->company();
            $compagny->phone   = $faker->e164PhoneNumber();
            $compagny->email   = $faker->email();
            $compagny->siret   = $faker->iban($countryCode = 'FR');
            $compagny->rib     = $faker->iban($countryCode = 'FR');
            $compagny->adress1 = $faker->streetAddress();
            $compagny->adress2 = ($i%5==0)? $faker->streetSuffix : null;
            $compagny->lat     = $faker->latitude($min = -90, $max = 90);
            $compagny->lng     = $faker->longitude($min = -180, $max = 180);
            $compagny->user_id = $faker->numberBetween($min = 1, $max = 300);
        }
    }
}
