<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rooms_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('rooms')->insert([
            'room_name' => 'Room 1',
            'description' => 'Description Room 1.',
            'site_id' => 1,
        ]);
    }
}
