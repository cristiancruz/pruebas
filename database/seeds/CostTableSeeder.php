<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('costs')->insert([
        'nameCosts' => 'Materiales'
         ]);
        DB::table('costs')->insert([
            'nameCosts' => 'Mano de obra'
        ]);
        DB::table('costs')->insert([
            'nameCosts' => 'Herramientas'
        ]);
        DB::table('costs')->insert([
            'nameCosts' => 'Equipo'
        ]);
        DB::table('costs')->insert([
            'nameCosts' => 'Subcontratos'
        ]);
        DB::table('costs')->insert([
            'nameCosts' => 'Indirectos'
        ]);
    }
}
