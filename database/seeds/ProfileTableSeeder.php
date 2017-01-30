<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'nameProfile' => 'Administrador'
        ]);
        DB::table('profiles')->insert([
            'nameProfile' => 'Invitado'
        ]);
    }
}
