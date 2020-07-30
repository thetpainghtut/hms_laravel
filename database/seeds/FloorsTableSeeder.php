<?php

use Illuminate\Database\Seeder;
use App\Floor;

class FloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Floor::create(['name' => '1-floor']);
      Floor::create(['name' => '2-floor']);
    }
}
