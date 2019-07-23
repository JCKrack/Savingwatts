<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class appliances_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('appliances')->insert([
            'appliance_name' => 'Light',
            'description' => 'Description Lights',
            'room_id' => 1,
        ]);

        DB::table('appliances')->insert([
            'appliance_name' => 'Charger',
            'description' => 'Description Charger',
            'room_id' => 1,
        ]);

        DB::table('appliances')->insert([
            'appliance_name' => 'Fan',
            'description' => 'Description Fan',
            'room_id' => 1,
        ]);
    }
}
