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
        $this->call(EmployersTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
