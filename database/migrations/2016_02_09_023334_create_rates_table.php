<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rates_order');
            $table->string('rates_price');
            $table->string('rates_info');
            $table->integer('rates_cat_id')->unsigned();
            $table->foreign('rates_cat_id')->references('id')->on('rates_cat');

        });
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('rates');
    }
}
