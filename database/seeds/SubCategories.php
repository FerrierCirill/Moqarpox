<?php

use Illuminate\Database\Seeder;

class SubCategories extends Seeder
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

        DB::table('subCategories')->insert([
            'name'        => 'Stage de Pilotage',
            'category_id' => '1'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Activité Aérienne',
            'category_id' => '1'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Activité Nature',
            'category_id' => '1'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Activité Neige',
            'category_id' => '1'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Activité d\'Intérieur',
            'category_id' => '1'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Sport Nautique & Aquatique',
            'category_id' => '1'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Coach sportif 7 Fitness',
            'category_id' => '1'
        ]);

        // ================================ //
            // Séjour & Weekend

        DB::table('subCategories')->insert([
            'name'        => 'Week-end en Amoureux',
            'category_id' => '2'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Week-end Thalasso & Spa',
            'category_id' => '2'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Week-end Insolite',
            'category_id' => '2'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Week-end en Famille',
            'category_id' => '2'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Week-end en Famille',
            'category_id' => '2'
        ]);

        // ================================ //
            // Beauté & Bien-être

        DB::table('subCategories')->insert([
            'name'        => 'Soin et Massage',
            'category_id' => '3'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Spa et Thalasso',
            'category_id' => '3'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Beauté',
            'category_id' => '3'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Minceur et fitness',
            'category_id' => '3'
        ]);

        // ================================ //
            // Gastronomie

        DB::table('subCategories')->insert([
            'name'        => 'Restaurant',
            'category_id' => '4'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Dégustation',
            'category_id' => '4'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Atelier Culinaire',
            'category_id' => '4'
        ]);

        DB::table('subCategories')->insert([
            'name'        => 'Oenologie',
            'category_id' => '4'
        ]);
    
    }
}
