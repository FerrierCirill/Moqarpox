<?php

use Illuminate\Database\Seeder;
use App\Picture;


class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(\App\Picture::class, 10000)->create();

        DB::table('pictures')->insert([
            'id' => '1',
            'link' => '/images/upload/activities/1.jpeg',
            'activity_id' => '1'
        ]);
        DB::table('pictures')->insert([
            'id' => '2',
            'link' => '/images/upload/activities/2.jpg',
            'activity_id' => '2'
        ]);
    }
}
