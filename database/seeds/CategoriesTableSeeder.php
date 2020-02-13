<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Sport & Aventure', 
            'link' => 'images/categories/sport.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'Séjour & Weekend',
            'link' => 'images/categories/sejour.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'Beauté & Bien-être',
            'link' => 'images/categories/spa.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'Gastronomie',
            'link' => 'images/categories/gastro.jpg'

        ]);
        DB::table('categories')->insert([
            'name' => 'Multi-Categories', 
            'link' => 'images/categories/multi.jpg'
        ]);
    }
}
