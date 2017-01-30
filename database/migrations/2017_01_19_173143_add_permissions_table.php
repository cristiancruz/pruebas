<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            //relacion
            $table->integer('profiles_id')->unsigned();
            //relacion
            $table->integer('sections_id')->unsigned();
            $table->integer('view');
            $table->integer('add');
            $table->integer('update');
            $table->integer('delete');

            $table->foreign('profiles_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('sections_id')->references('id')->on('sections')->onDelete('cascade');

            $table->timestamps();
        });

        //profiles & permissions = profiles_permissions
        Schema::create('permissions_proccesses', function (Blueprint $table) {
            $table->increments('id');
            //relacion
            $table->integer('profiles_id')->unsigned();
            $table->integer('proccesses_id')->unsigned();


            $table->foreign('profiles_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('proccesses_id')->references('id')->on('proccesses')->onDelete('cascade');

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
        Schema::drop('permissions');
    }
}
