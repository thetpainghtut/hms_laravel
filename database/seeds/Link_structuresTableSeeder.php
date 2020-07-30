<?php

use Illuminate\Database\Seeder;
use App\Link_structure;

class Link_structuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Link_structure::create(['name' => 'roomservices','icon' => 'flaticon2-line']);
      Link_structure::create(['name' => 'roomtypes','icon' => 'flaticon2-line']);
      Link_structure::create(['name' => 'rooms','icon' => 'flaticon2-line']);

      Link_structure::create(['name' => 'discounts','icon' => 'flaticon2-line']);
      Link_structure::create(['name' => 'damages','icon' => 'flaticon2-line']);
      Link_structure::create(['name' => 'guests','status' => 1,'icon' => 'flaticon2-avatar']);
      Link_structure::create(['name' => 'checkins','status' => 1,'icon' => 'flaticon-interface-9']);
      Link_structure::create(['name' => 'reservations','status' => 1,'icon' => 'flaticon-event-calendar-symbol']);
      Link_structure::create(['name' => 'promotions','status' => 1,'icon' => 'flaticon-event-calendar-symbol']);
    }
}
