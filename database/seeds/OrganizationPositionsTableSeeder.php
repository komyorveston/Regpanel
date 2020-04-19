<?php

use Illuminate\Database\Seeder;

class OrganizationPositionsTableSeeder extends Seeder
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
        		'org_id' => '1',
        		'pos_id' => '1',
        	],
        	[
        		'org_id' => '1',
        		'pos_id' => '2',
        	],
        	[
        		'org_id' => '1',
        		'pos_id' => '3',
        	],
        	[
        		'org_id' => '1',
        		'pos_id' => '4',
        	],
        	[
        		'org_id' => '1',
        		'pos_id' => '5',
        	],
        	[
        		'org_id' => '1',
        		'pos_id' => '6',
        	],
        	[
        		'org_id' => '1',
        		'pos_id' => '7',
        	],
        	[
        		'org_id' => '1',
        		'pos_id' => '8',
        	],
        	[
        		'org_id' => '2',
        		'pos_id' => '1',
        	],
        	[
        		'org_id' => '2',
        		'pos_id' => '2',
        	],
        	[
        		'org_id' => '2',
        		'pos_id' => '3',
        	],
        	[
        		'org_id' => '2',
        		'pos_id' => '4',
        	],
        	[
        		'org_id' => '2',
        		'pos_id' => '5',
        	],
        	[
        		'org_id' => '2',
        		'pos_id' => '6',
        	],
        	[
        		'org_id' => '3',
        		'pos_id' => '1',
        	],
        	[
        		'org_id' => '3',
        		'pos_id' => '2',
        	],
        	[
        		'org_id' => '3',
        		'pos_id' => '3',
        	],
        	[
        		'org_id' => '3',
        		'pos_id' => '4',
        	],
        	[
        		'org_id' => '3',
        		'pos_id' => '5',
        	],
        	[
        		'org_id' => '3',
        		'pos_id' => '6',
        	],

        ];
        	DB::table('organization_positions')->insert($data);
    }
}
