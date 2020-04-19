<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
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
        		'title' => 'Организация 1',
        		'description' => 'Описание оргиниации 1',
        		'img' => 'Org.png',
        		'created_user' => '1',
        		'status' => '1',
        	],
        	[
        		'id' => '2',
        		'title' => 'Оргинизация 2',
        		'description' => 'Описание оргинизации 2',
        		'img' => 'Org.png',
        		'created_user' => '1',
        		'status' => '1',
        	],
        	[
        		'id' => '3',
        		'title' => 'Оргинизация 3',
        		'description' => 'Описание оргинизации 3',
        		'img' => 'Org.png',
        		'created_user' => '2',
        		'status' => '1',
        	],
        	[
        		'id' => '4',
        		'title' => 'Оргинизация 4',
        		'description' => 'Описание оргинизации 4',
        		'img' => 'Org.png',
        		'created_user' => '2',
        		'status' => '1',
        	],

        ];
            DB::table('organizations')->insert($data);
    }
}
