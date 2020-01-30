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
        factory(\App\Picture::class, 10000)->create();
    }
}
