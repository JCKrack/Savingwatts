<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class devices_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('devices')->insert([
            'device_uuid' => '123Light',
            'device_status' => 'Room 1 Light',
            'appliance_id' => 1,
        ]);

        DB::table('devices')->insert([
            'device_uuid' => '123Charger',
            'device_status' => 'Room 1 Charger',
            'appliance_id' => 2,
        ]);

        DB::table('devices')->insert([
            'device_uuid' => '123Fan',
            'device_status' => 'Room 1 Fan',
            'appliance_id' => 3,
        ]);
    }
}
