<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ActivitiesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CompagniesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
    }
}
