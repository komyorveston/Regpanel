<?php

use Illuminate\Database\Seeder;

class DepartmentPositionsTableSeeder extends Seeder
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
        		'pos_id' => '1',
        	],
        	[
        		'dep_id' => '1',
        		'pos_id' => '2',
        	],
        	[
        		'dep_id' => '2',
        		'pos_id' => '1',
        	],
        	[
        		'dep_id' => '2',
        		'pos_id' => '2',
        	],
        	[
        		'dep_id' => '3',
        		'pos_id' => '1',
        	],
        	[
        		'dep_id' => '3',
        		'pos_id' => '3',
        	],
        	[
        		'dep_id' => '4',
        		'pos_id' => '1',
        	],
        	[
        		'dep_id' => '4',
        		'pos_id' => '4',
        	],
        	[
        		'dep_id' => '5',
        		'pos_id' => '1',
        	],
        	[
        		'dep_id' => '5',
        		'pos_id' => '5',
        	],
        	[
        		'dep_id' => '6',
        		'pos_id' => '1',
        	],
        	[
        		'dep_id' => '6',
        		'pos_id' => '6',
        	],
        	[
        		'dep_id' => '7',
        		'pos_id' => '1',
        	],
        	[
        		'dep_id' => '7',
        		'pos_id' => '7',
        	],
        	[
        		'dep_id' => '8',
        		'pos_id' => '1',
        	],
        	[
        		'dep_id' => '8',
        		'pos_id' => '8',
        	],
        ];

            DB::table('department_positions')->insert($data);
    }
}
