<?php

use Illuminate\Database\Seeder;

class ArrivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Arrive::class,12)->create();
    }
}
