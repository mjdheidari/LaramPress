<?php

use Illuminate\Database\Seeder;

class AdminGenerator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            'name'=>"Manager",
            'email'=>"manager@larampress.com",
            'level'=>"manager",
            'password'=>Hash::make("larampress")
        ]);
    }
}
