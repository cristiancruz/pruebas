<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CostTableSeeder::class);
        $this->call(ClassificationTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(BankTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EstateTableSeeder::class);


    }
}
