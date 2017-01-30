<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class ClassificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classification')->insert([
            'nameClassification' => 'Compresores'
        ]);
        DB::table('classification')->insert([
            'nameClassification' => 'Gatos tensados'
        ]);
        DB::table('classification')->insert([
            'nameClassification' => 'Herramienta menor'
        ]);
        DB::table('classification')->insert([
            'nameClassification' => 'Lanzadoras de concreto'
        ]);
        DB::table('classification')->insert([
            'nameClassification' => 'Maquinaria perforación'
        ]);
        DB::table('classification')->insert([
            'nameClassification' => 'Maquinaria pesada'
        ]);
        DB::table('classification')->insert([
            'nameClassification' => 'Vehiculos'
        ]);
    }
}
