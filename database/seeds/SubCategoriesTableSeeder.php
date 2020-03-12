<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ================================ //
            // Sport et aventure

        DB::table('subcategories')->insert([
            'name'        => 'Stage de Pilotage',
            'category_id' => '1'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Activité Aérienne',
            'category_id' => '1'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Activité Nature',
            'category_id' => '1'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Activité Neige',
            'category_id' => '1'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Activité d\'Intérieur',
            'category_id' => '1'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Sport Nautique & Aquatique',
            'category_id' => '1'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Coach sportif 7 Fitness',
            'category_id' => '1'
        ]);

        // ================================ //
            // Séjour & Weekend

        DB::table('subcategories')->insert([
            'name'        => 'Week-end en Amoureux',
            'category_id' => '2'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Week-end Thalasso & Spa',
            'category_id' => '2'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Week-end Insolite',
            'category_id' => '2'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Week-end en Famille',
            'category_id' => '2'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Week-end en Famille',
            'category_id' => '2'
        ]);

        // ================================ //
            // Beauté & Bien-être

        DB::table('subcategories')->insert([
            'name'        => 'Soin et Massage',
            'category_id' => '3'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Spa et Thalasso',
            'category_id' => '3'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Beauté',
            'category_id' => '3'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Minceur et fitness',
            'category_id' => '3'
        ]);

        // ================================ //
            // Gastronomie

        DB::table('subcategories')->insert([
            'name'        => 'Restaurant',
            'category_id' => '4'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Dégustation',
            'category_id' => '4'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Atelier Culinaire',
            'category_id' => '4'
        ]);

        DB::table('subcategories')->insert([
            'name'        => 'Oenologie',
            'category_id' => '4'
        ]);

    }
}
