<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'bank' => 'Banamex'
        ]);
        DB::table('banks')->insert([
            'bank' => 'Bancomer'
        ]);
    }
}
