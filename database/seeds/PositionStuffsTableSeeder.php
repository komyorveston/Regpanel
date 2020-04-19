<?php

use Illuminate\Database\Seeder;

class PositionStuffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
        	[
        		'pos_id' => '1',
        		'stuff_id' => '1',
        	],
        	[
        		'pos_id' => '2',
        		'stuff_id' => '2',
        	],
        	[
        		'pos_id' => '3',
        		'stuff_id' => '3',
        	],
        	[
        		'pos_id' => '4',
        		'stuff_id' => '4',
        	],
        	[
        		'pos_id' => '5',
        		'stuff_id' => '5',
        	],
        	[
        		'pos_id' => '6',
        		'stuff_id' => '6',
        	],
        	[
        		'pos_id' => '7',
        		'stuff_id' => '7',
        	],
        	[
        		'pos_id' => '8',
        		'stuff_id' => '8',
        	],
        	[
        		'pos_id' => '1',
        		'stuff_id' => '9',
        	],
        	[
        		'pos_id' => '1',
        		'stuff_id' => '10',
        	],
        	[
        		'pos_id' => '2',
        		'stuff_id' => '11',
        	],
        ];
        	DB::table('position_stuffs')->insert($data);

    }
}
