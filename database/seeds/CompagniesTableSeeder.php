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
        factory(\App\Compagny::class, 1000)->create();
    }
}
