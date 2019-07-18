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
    }
}
