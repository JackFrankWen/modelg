<?php

use Illuminate\Database\Seeder;

class createsuper extends Seeder
{
    /**
     * Run the database seeds.Insert a data
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                    'name' => str_random(10),
                    'email' => 'super@gmail.com',
                    'password' => bcrypt('123456'),
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString()
                ]);
    }
}
