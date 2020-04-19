<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;

    class UsersTableSeeder extends Seeder
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
                    'id' => 1,
                    'name' => 'admin',
                    'surname' => 'adminov',
                    'fathersname' => 'adminovich',
                    'email' => 'a@a.ru',
                    'phone' => '989345678',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 2,
                    'name' => 'user',
                    'surname' => 'userov',
                    'fathersname' => 'userovich',
                    'phone' => '989345678',
                    'email' => 'u@u.ru',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 3,
                    'name' => 'sasha',
                    'surname' => 'sashayev',
                    'fathersname' => 'sashavich',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru8',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 4,
                    'name' => 'masha',
                    'surname' => 'masheva',
                    'fathersname' => 'machevna',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru9',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 5,
                    'name' => 'pasha',
                    'surname' => 'pashev',
                    'fathersname' => 'pashevich',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru10',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 6,
                    'name' => 'misha',
                    'surname' => 'mishev',
                    'fathersname' => 'mishevich',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru11',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 7,
                    'name' => 'dasha',
                    'surname' => 'dasheva',
                    'fathersname' => 'dashevna',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru12',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 8,
                    'name' => 'olia',
                    'surname' => 'oliava',
                    'fathersname' => 'oliavna',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru13',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 9,
                    'name' => 'kolia',
                    'surname' => 'kolien',
                    'fathersname' => 'kolievich',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru14',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 10,
                    'name' => 'oleg',
                    'surname' => 'olegov',
                    'fathersname' => 'olegovich',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru15',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 11,
                    'name' => 'ira',
                    'surname' => 'irava',
                    'fathersname' => 'iravna',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru16',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 12,
                    'name' => 'nastia',
                    'surname' => 'nastiava',
                    'fathersname' => 'nastiavna',
                    'phone' => '934856970',
                    'email' => 'admin@admin.ru17',
                    'password' => bcrypt(12345678),
                ],
            ];
            DB::table('users')->insert($data);
        }

    }
