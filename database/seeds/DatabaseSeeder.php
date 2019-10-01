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
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        // $this->call(AgentsTableSeeder::class);
        $this->call(GestionnairesTableSeeder::class);
        $this->call(AdministrateursTableSeeder::class);
        //$this->call(ProfilesTableSeeder::class);
        $this->call(TypesCourriersTableSeeder::class);
        // $this->call(SexesTableSeeder::class);
        //$this->call(ArrivesTableSeeder::class);
    }
}
