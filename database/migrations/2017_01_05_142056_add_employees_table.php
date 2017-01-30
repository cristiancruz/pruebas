<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numberEmployee');
            //relacion a job
            $table->integer('job_id')->unsigned();
            $table->date('dateStart');
            $table->string('name');
            $table->string('lastName');
            $table->string('motherLastName');
            $table->string('imss');
            $table->string('curp');
            $table->string('rfc');
            $table->double('dailySalary');
            $table->double('dailyInfonavit');
            $table->double('localCompensation');
            $table->double('foreignCompensation');
            $table->string('nomineCard');
            $table->string('bankAccount');
           //relacion a banco
            $table->integer('bank_id')->unsigned()->nullable();;
            $table->string('phone');
            $table->string('cellPhone');
            $table->string('email');
            $table->string('street');
            $table->string('numberI');
            $table->string('numberE');
            $table->string('colony');
            $table->string('emergencyData');
            $table->string('birthPlace');
            $table->date('birthDate');
            $table->string('observations');
            $table->enum('status',['activo', 'inactivo','listaNegra'])->default('activo');
            $table->enum('mainOffice',['obra', 'oficinacentral'])->default('obra');
            $table->integer('user_id');

            $table->foreign('job_id')->references('id')->on('job')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
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
        Schema::drop('employees');
    }
}
