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
            'state' => 1,
            'civility' => 'man',
            'admin' => 1
        ]);

    //        DB::table('users')->insert([
    //            'first_name' => 'client',
    //            'second_name' => 'client',
    //            'phone' => '0000000000',
    //            'email' => 'client@client.com',
    //            'password' => bcrypt('client'),
    //            'state' => 0,
    //            'civility' => 'man',
    //            'admin' => 0
    //        ]);
    //
    //        DB::table('users')->insert([
    //            'first_name' => 'provider',
    //            'second_name' => 'provider',
    //            'phone' => '0000000000',
    //            'email' => 'provider@provider.com',
    //            'password' => bcrypt('provider'),
    //            'state' => 1,
    //            'civility' => 'man',
    //            'admin' => 0
    //        ]);

    //        factory(\App\User::class, 1000)->create();
    }
}
