<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('numberClient');
            $table->enum('raiting',['1','2','3','4','5'])->default('1');
            $table->string('comments');
            $table->enum('status',['activo','inactivo'])->default('activo');
            $table->string('logoDefault');
            $table->string('logoClient');
            $table->string('nameContact');
            $table->string('jobContact');
            $table->string('phoneContact');
            $table->string('cellContact');
            $table->string('email');
            $table->integer('user_id');

                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
