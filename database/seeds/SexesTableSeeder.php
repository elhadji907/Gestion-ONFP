<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sexe1=App\Sex::firstOrCreate(["name"=>"masculin"],["uuid"=>Str::uuid()]);
        $sexe2=App\Sex::firstOrCreate(["name"=>"feminin"],["uuid"=>Str::uuid()]);
    }
}
