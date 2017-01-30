<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //->nullable();
        //$total = User::sum('votes');
        /*
         llenar tabla pigote
        $article->tags()->sync($request->tags);
        */
        
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('nameFamily',50);
            $table->string('description',50);
            $table->enum('type',['obra', 'oficina'])->default('obra');
            $table->integer('cost_id')->unsigned();

            $table->foreign('cost_id')->references('id')->on('costs')->onDelete('cascade');
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
        Schema::drop('families');
    }
}
