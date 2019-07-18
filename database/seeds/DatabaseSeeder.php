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
        $this->call([
        	account_status_types_TableSeeder::class,
        	users_TableSeeder::class,
        	sites_TableSeeder::class,
        	rooms_TableSeeder::class,
        	appliances_TableSeeder::class,
        	devices_TableSeeder::class,
        ]);
    }
}
