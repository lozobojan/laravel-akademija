<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        \App\Models\Country::factory(10)->create();
        CitySeeder::run();
        \App\Models\City::factory(100)->create();
        \App\Models\Contact::factory(200)->create();
    }
}
