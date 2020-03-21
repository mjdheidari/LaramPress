<?php

use Illuminate\Database\Seeder;

class ThemepagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("theme_pages")->insert([
            ['page'=>'about-us'],
            ['page'=>'contact-us'],
        ]);
    }
}
