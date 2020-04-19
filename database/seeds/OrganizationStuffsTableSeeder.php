<?php

use Illuminate\Database\Seeder;

class OrganizationStuffsTableSeeder extends Seeder
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
        		'stuff_id' => '2',
        	],
        	[
        		'org_id' => '1',
        		'stuff_id' => '3',
        	],
        	[
        		'org_id' => '1',
        		'stuff_id' => '4',
        	],
        	[
        		'org_id' => '1',
        		'stuff_id' => '5',
        	],
        	[
        		'org_id' => '1',
        		'stuff_id' => '6',
        	],
        	[
        		'org_id' => '1',
        		'stuff_id' => '7',
        	],
        	[
        		'org_id' => '1',
        		'stuff_id' => '8',
        	],
        	[
        		'org_id' => '1',
        		'stuff_id' => '9',
        	],
        	[
        		'org_id' => '1',
        		'stuff_id' => '10',
        	],
        	[
        		'org_id' => '1',
        		'stuff_id' => '11',
        	],
          	[
        		'org_id' => '2',
        		'stuff_id' => '2',
        	],
        	[
        		'org_id' => '2',
        		'stuff_id' => '3',
        	],
        	[
        		'org_id' => '2',
        		'stuff_id' => '4',
        	],
        	[
        		'org_id' => '2',
        		'stuff_id' => '5',
        	],
        	[
        		'org_id' => '2',
        		'stuff_id' => '6',
        	],
        ];
        	DB::table('organization_stuffs')->insert($data);
    }
}
