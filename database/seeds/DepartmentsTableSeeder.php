<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
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
        		'id' => '1',
        		'title' => 'Отдел 1',
        		'parent_id' => '0',
                'organization_id' => '1',
        		'description' => 'Описание отдела 1',
        		'img' => 'Dep.png',
        		'created_user' => '1',
                'status' => '1',
        	],
        	[
        		'id' => '2',
        		'title' => 'Отдел 2',
        		'parent_id' => '0',
                'organization_id' => '1',
        		'description' => 'Описание отдела 2',
        		'img' => 'Dep.png',
        		'created_user' => '1',
                'status' => '1',
        	],
        	[
        		'id' => '3',
        		'title' => 'Отдел 3',
        		'parent_id' => '0',
                'organization_id' => '1',
        		'description' => 'Описание отдела 3',
        		'img' => 'Dep.png',
        		'created_user' => '1',
                'status' => '1',
        	],
        	[
        		'id' => '4',
        		'title' => 'Отдел 4',
        		'parent_id' => '0',
                'organization_id' => '1',
        		'description' => 'Описание отдела 4',
        		'img' => 'Dep.png',
        		'created_user' => '1',
                'status' => '1',
        	],
        	[
        		'id' => '5',
        		'title' => 'Отдел 5',
        		'parent_id' => '0',
                'organization_id' => '1',
        		'description' => 'Описание отдела 5',
        		'img' => 'Dep.png',
        		'created_user' => '1',
                'status' => '1',
        	],
        	[
        		'id' => '6',
        		'title' => 'Отдел 6',
        		'parent_id' => '0',
                'organization_id' => '1',
        		'description' => 'Описание отдела 6',
        		'img' => 'Dep.png',
        		'created_user' => '1',
                'status' => '1',
        	],
        	[
        		'id' => '7',
        		'title' => 'Отдел 1.1',
        		'parent_id' => '1',
                'organization_id' => '1',
        		'description' => 'Описание отдела 1.1',
        		'img' => 'Dep.png',
        		'created_user' => '1',
                'status' => '1',
        	],
        	[
        		'id' => '8',
        		'title' => 'Отдел 1.2',
        		'parent_id' => '1',
                'organization_id' => '1',
        		'description' => 'Описание отдела 1.2',
        		'img' => 'Dep.png',
        		'created_user' => '1',
                'status' => '1',
        	],
        ];

        DB::table('departments')->insert($data);
    }
}
