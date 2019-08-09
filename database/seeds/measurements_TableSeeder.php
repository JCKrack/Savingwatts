<?php

use Illuminate\Database\Seeder;

class measurements_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('measurements')->insert([
    		[
    			'measure' => 80,
	            'device_id' => 1,
	            'created_at' => '2019-07-23 00:23:38',

    		],
    		[
    			'measure' => 82,
	            'device_id' => 1,
	            'created_at' => '2019-07-23 00:23:42',
    		],
    		[
    			'measure' => 78,
	            'device_id' => 1,
	            'created_at' => '2019-07-23 00:23:46',
    		],
    		[
    			'measure' => 83,
	            'device_id' => 1,
	            'created_at' => '2019-07-23 00:23:50',
    		],
    		[
    			'measure' => 115,
	            'device_id' => 2,
	            'created_at' => '2019-07-23 00:23:38',
    		],
    		[
    			'measure' => 116,
	            'device_id' => 2,
	            'created_at' => '2019-07-23 00:23:42',
    		],
    		[
    			'measure' => 114,
	            'device_id' => 2,
	            'created_at' => '2019-07-23 00:23:46',
    		],
    		[
    			'measure' => 117,
	            'device_id' => 2,
	            'created_at' => '2019-07-23 00:23:50',
    		],
    		[
    			'measure' => 124,
	            'device_id' => 3,
	            'created_at' => '2019-07-23 00:23:38',
    		],
    		[
    			'measure' => 122,
	            'device_id' => 3,
	            'created_at' => '2019-07-23 00:23:42',
    		],
    		[
    			'measure' => 119,
	            'device_id' => 3,
	            'created_at' => '2019-07-23 00:23:46',
    		],
    		[
    			'measure' => 121,
	            'device_id' => 3,
	            'created_at' => '2019-07-23 00:23:50',
    		]
        ]);
    }
}
