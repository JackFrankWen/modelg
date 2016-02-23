<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserlogRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlogin_record', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_ip');
            $table->dateTime('login_at');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userlogin_record');
    }
}
