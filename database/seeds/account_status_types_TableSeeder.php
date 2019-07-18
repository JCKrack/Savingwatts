<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class account_status_types_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('account_status_types')->insert([
            'type_name' => 'Active',
            'description' => 'Account Active',
        ]);

    	 DB::table('account_status_types')->insert([
            'type_name' => 'Inactive',
            'description' => 'Account Inactive',
        ]);
    }
}
