<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_info',function (Blueprint $table){
            $table->integer('id');
            $table->string('shop_name');
            $table->string('shop_solgan');
            $table->string('shop_email');
            $table->string('shop_city');
            $table->string('shop_suburb');
            $table->string('shop_state');
            $table->string('shop_phone');
            $table->string('shop_postcode');
            $table->string('shop_address');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
       Schema::drop('shop_info');
    }
}
