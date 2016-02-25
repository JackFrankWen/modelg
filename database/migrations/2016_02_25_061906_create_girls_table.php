<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGirlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girls', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('girl_name');
                    $table->string('girl_age');
                    $table->string('girl_nation');
                    $table->string('img_url');
                    $table->boolean('active');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('girls');
    }
}
