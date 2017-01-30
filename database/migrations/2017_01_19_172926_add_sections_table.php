<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reference');
            $table->string('section');
            $table->string('description');
            $table->string('url');
            $table->integer('order');
            $table->integer('haveAdd');
            $table->integer('haveUpdate');
            $table->integer('haveDelete');
            //relacion
            $table->integer('company_social_reason_id')->unsigned()->nullable();
            $table->string('documentInstruction');


            $table->foreign('company_social_reason_id')->references('id')->on('company_social_reason')->onDelete('cascade');


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
        Schema::drop('sections');
    }
}
