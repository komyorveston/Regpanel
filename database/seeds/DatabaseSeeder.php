<?php

    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {

            $this->call(RolesTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(UserRolesTableSeeder::class);
            $this->call(StuffsSeeder::class);
            $this->call(DepartmentsTableSeeder::class);
            $this->call(PositionsTableSeeder::class);
            $this->call(OrganizationsTableSeeder::class);
            $this->call(DepartmentPositionsTableSeeder::class);
            $this->call(DepartmentStuffsTableSeeder::class);
            $this->call(OrganizationDepsTableSeeder::class);
            $this->call(OrganizationStuffsTableSeeder::class);
            $this->call(OrganizationPositionsTableSeeder::class);
            $this->call(PositionStuffsTableSeeder::class);
        }
    }
