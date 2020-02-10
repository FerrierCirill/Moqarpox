<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'admin',
            'second_name' => 'admin',
            'phone' => '0000000000',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'state' => 0,
            'civility' => 'Mr.',
            'provider' => 0,
            'admin' => 1
        ]);

        factory(\App\User::class, 1000)->create();
    }
}
