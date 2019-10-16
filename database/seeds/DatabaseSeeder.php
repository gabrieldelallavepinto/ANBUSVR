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
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ParticipantsTableSeeder::class);
        $this->call(GazesTableSeeder::class);
        $this->call(GrabbsTableSeeder::class);
    }
}
