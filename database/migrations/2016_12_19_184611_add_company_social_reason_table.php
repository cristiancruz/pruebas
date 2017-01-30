<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanySocialReasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_social_reason', function (Blueprint $table) {
            $table->increments('id');

            $table->string('companyReason',50);
            $table->string('rfc');
            $table->string('phone');
            $table->string('street');
            $table->string('numberI');
            $table->string('numberE');
            $table->string('colony');
            $table->string('cp');
            $table->string('city');
            $table->string('state');
            $table->string('website');
            $table->string('logoDefault');
            $table->string('logoEnterprice');
            $table->string('label1');
            $table->string('label2');
            $table->enum('status',['activo','inactivo'])->default('activo');
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
        Schema::drop('company_social_reason');
    }
}
