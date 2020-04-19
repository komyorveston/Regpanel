<?php

use Illuminate\Database\Seeder;

class OrganizationDepsTableSeeder extends Seeder
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
        		'dep_id' => '1',
        	],
        	[
        		'org_id' => '1',
        		'dep_id' => '2',
        	],
        	[
        		'org_id' => '1',
        		'dep_id' => '3',
        	],
        	[
        		'org_id' => '1',
        		'dep_id' => '4',
        	],
        	[
        		'org_id' => '1',
        		'dep_id' => '5',
        	],
        	[
        		'org_id' => '1',
        		'dep_id' => '6',
        	],
        	[
        		'org_id' => '1',
        		'dep_id' => '7',
        	],
        	[
        		'org_id' => '1',
        		'dep_id' => '8',
        	],
        	[
        		'org_id' => '2',
        		'dep_id' => '1',
        	],
        	[
        		'org_id' => '2',
        		'dep_id' => '2',
        	],
        	[
        		'org_id' => '2',
        		'dep_id' => '3',
        	],
        	[
        		'org_id' => '2',
        		'dep_id' => '4',
        	],
        	[
        		'org_id' => '2',
        		'dep_id' => '5',
        	],
        	[
        		'org_id' => '2',
        		'dep_id' => '6',
        	],
        	[
        		'org_id' => '3',
        		'dep_id' => '1',
        	],
        	[
        		'org_id' => '3',
        		'dep_id' => '2',
        	],
        	[
        		'org_id' => '3',
        		'dep_id' => '3',
        	],
        	[
        		'org_id' => '3',
        		'dep_id' => '4',
        	],
        	[
        		'org_id' => '4',
        		'dep_id' => '1',
        	],
        	[
        		'org_id' => '4',
        		'dep_id' => '2',
        	],
        	[
        		'org_id' => '4',
        		'dep_id' => '3',
        	],
        	[
        		'org_id' => '4',
        		'dep_id' => '4',
        	],
        ];
        	DB::table('organization_deps')->insert($data);

    }
}
