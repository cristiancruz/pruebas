<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiscountsIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts_income', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key',20);
            $table->string('description',30);
            $table->enum('type',['Ingresos','Descuentos'])->default('Ingresos');
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
        Schema::drop('discounts_income');
    }
}
