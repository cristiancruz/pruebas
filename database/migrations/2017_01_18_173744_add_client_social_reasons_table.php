<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientSocialReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_social_reasons', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned();
            $table->string('nameReason');
            $table->string('rfc');
            $table->string('street');
            $table->string('numberE');
            $table->string('numberI');
            $table->string('colony');
            $table->string('cp');
            $table->string('city');
            $table->string('state');
            $table->string('webSite');
            $table->string('label1');
            $table->string('label2');
            $table->enum('main',['si','no'])->default('no');
            $table->integer('user_id')->unsigned();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

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
        Schema::drop('client_social_reasons');
    }
}
