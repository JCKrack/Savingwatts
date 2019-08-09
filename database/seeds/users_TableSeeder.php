<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Eduardo',
            'last_name' => 'Rodriguez',
            'email' => '0316114100@miutt.edu.mx',
            'password' => bcrypt('secret'),
            'balance' => 0,
            'account_status_types_id' => 1,
        ]);
    }
}
