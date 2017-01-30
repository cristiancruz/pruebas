<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'root',
            'name' => 'Cristian A. Quijada',
            'email' => 'cristian@stratia.net',
            'password' => bcrypt('87411'),
            'bankAccount' => '0215888795',
            'bank_id' => 1,
            'profile_id' => 1,
            'user_id'=>1
        ]);
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'laura',
            'email' => 'laluna@stratia.net',
            'password' => bcrypt('8520'),
            'bankAccount' => '0215888795',
            'bank_id' => 1,
            'profile_id' => 1,
            'user_id'=>1
        ]);
        DB::table('users')->insert([
            'username' => 'prueba',
            'name' => 'Gil',
            'email' => 'gil@stratia.net',
            'password' => bcrypt('123456'),
            'bankAccount' => '0215888795',
            'bank_id' => 1,
            'profile_id' => 1,
            'user_id'=>1
        ]);

    }
}
