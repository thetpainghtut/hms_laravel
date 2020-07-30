<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FloorsTableSeeder::class);
        $this->call(Link_structuresTableSeeder::class);
    }
}
