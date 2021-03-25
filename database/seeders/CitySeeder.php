<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $cities = [
            ['name' => 'Podgorica', 'population' => 120000],
            ['name' => 'Budva', 'population' => 12000],
            ['name' => 'Tivat', 'population' => 10000],
            ['name' => 'Berane', 'population' => 25000],
        ];

        foreach ($cities as $city){
            City::query()->create($city);
        }
    }
}
