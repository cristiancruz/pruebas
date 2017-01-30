<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameProject');
            $table->enum('location',['local', 'foranea'])->default('local');

            $table->integer('client_id')->unsigned();
            $table->integer('client_social_reason_id')->unsigned();
            $table->integer('company_social_reason_id')->unsigned();

            $table->date('dateStart');
            $table->date('dateEnd');
            $table->string('alias');
            $table->string('commentJobs');
            $table->string('street');
            $table->string('numberE');
            $table->string('numberI');
            $table->string('nameContact');
            $table->string('phone');
            $table->string('email');
            $table->string('manager');
            $table->string('coordinator');
            $table->string('resident');
            $table->enum('estimation',['semana', 'quincena','mes'])->default('semana');
            $table->enum('estimationDay',['lunes', 'martes','miercoles','jueves','viernes','sabado','domingo'])->default('lunes');
            $table->enum('invoice',['semana', 'quincena','mes'])->default('semana');
            $table->enum('invoiceDay',['lunes', 'martes','miercoles','jueves','viernes','sabado','domingo'])->default('lunes');
            $table->enum('pay',['semana', 'quincena','mes'])->default('semana');
            $table->enum('payDay',['lunes', 'martes','miercoles','jueves','viernes','sabado','domingo'])->default('lunes');
            $table->string('label1');
            $table->string('label2');
            $table->integer('user_id');
            $table->integer('developments_id')->nullable();
            $table->enum('status',['activo', 'inactivo','finalizado'])->default('activo');

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('client_social_reason_id')->references('id')->on('client_social_reasons')->onDelete('cascade');
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
        Schema::drop('projects');
    }
}
