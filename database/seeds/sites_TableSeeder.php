<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sites_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
            'site_name' => 'Floor 1',
            'description' => 'Description Floor 1.',
            'site_status' => 'Active',
            'account_id' => 1,
        ]);
    }
}
