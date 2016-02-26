<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatGirlRosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girl_roster', function (Blueprint $table) {
                    $table->increments('id');
                    $table->boolean('mon')->default(0);
                    $table->boolean('tue')->default(0);
                    $table->boolean('wed')->default(0);
                    $table->boolean('thu')->default(0);
                    $table->boolean('fri')->default(0);
                    $table->boolean('sat')->default(0);
                    $table->boolean('sun')->default(0);
                    $table->integer('girl_id')->unsigned();
                    $table->foreign('girl_id')->references('id')->on('girls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('girl_roster');
    }
}
