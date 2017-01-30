<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proccesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameProccess');
            $table->integer('sections_id')->unsigned()->nullable();
            $table->foreign('sections_id')->references('id')->on('sections')->onDelete('cascade');
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
        Schema::drop('proccesses');
    }
}
