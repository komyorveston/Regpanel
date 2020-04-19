<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
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
        		'title' => 'Должность 1',
        		'description' => 'Описание 1',
        		'created_user' => '1',
        		'status' => '1',
        	],
        	[
        		'id' => '2',
        		'title' => 'Должность 2',
        		'description' => 'Описание 2',
        		'created_user' => '1',
        		'status' => '1',
        	],
        	[
        		'id' => '3',
        		'title' => 'Должность 3',
        		'description' => 'Описание 3',
        		'created_user' => '1',
        		'status' => '1',
        	],
        	[
        		'id' => '4',
        		'title' => 'Должность 4',
        		'description' => 'Описание 4',
        		'created_user' => '1',
        		'status' => '1',
        	],
        	[
        		'id' => '5',
        		'title' => 'Должность 5',
        		'description' => 'Описание 5',
        		'created_user' => '1',
        		'status' => '1',
        	],
        	[
        		'id' => '6',
        		'title' => 'Должность 6',
        		'description' => 'Описание 6',
        		'created_user' => '1',
        		'status' => '1',
        	],
        	[
        		'id' => '7',
        		'title' => 'Должность 7',
        		'description' => 'Описание 7',
        		'created_user' => '1',
        		'status' => '1',
        	],
        	[
        		'id' => '8',
        		'title' => 'Должность 8',
        		'description' => 'Описание 8',
        		'created_user' => '1',
        		'status' => '1',
        	],

        ];
        	DB::table('positions')->insert($data);
    }
}
