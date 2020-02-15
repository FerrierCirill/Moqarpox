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
            'link' => 'images/categories/sport.jpg',
            'hexa' => '#9638E0'
        ]);
        DB::table('categories')->insert([
            'name' => 'Séjour & Weekend',
            'link' => 'images/categories/sejour.jpg',
            'hexa' => '#37E2E2'
        ]);
        DB::table('categories')->insert([
            'name' => 'Beauté & Bien-être',
            'link' => 'images/categories/spa.jpg',
            'hexa' => '#15ED34'
        ]);
        DB::table('categories')->insert([
            'name' => 'Gastronomie',
            'link' => 'images/categories/gastro.jpg',
            'hexa' => '#E83C2A'

        ]);
        DB::table('categories')->insert([
            'name' => 'Multi-Categories', 
            'link' => 'images/categories/multi.jpg',
            'hexa' => '#EAEF30'
        ]);
    }
}
