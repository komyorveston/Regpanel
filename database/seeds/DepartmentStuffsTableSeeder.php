<?php

use Illuminate\Database\Seeder;

class DepartmentStuffsTableSeeder extends Seeder
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
        		'dep_id' => '1',
        		'stuff_id' => '1',
        	],
        	[
        		'dep_id' => '1',
        		'stuff_id' => '2',
        	],
        	[
        		'dep_id' => '2',
        		'stuff_id' => '3',
        	],
        	[
        		'dep_id' => '2',
        		'stuff_id' => '4',
        	],
        	[
        		'dep_id' => '3',
        		'stuff_id' => '5',
        	],
        	[
        		'dep_id' => '4',
        		'stuff_id' => '6',
        	],
        	[
        		'dep_id' => '5',
        		'stuff_id' => '7',
        	],
        	[
        		'dep_id' => '6',
        		'stuff_id' => '8',
        	],
        	[
        		'dep_id' => '7',
        		'stuff_id' => '9',
        	],
        	[
        		'dep_id' => '8',
        		'stuff_id' => '10',
        	],
        	[
        		'dep_id' => '8',
        		'stuff_id' => '11',
        	],
        ];
        	DB::table('department_stuffs')->insert($data);

    }
}
