<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Shop\Brand;
use Illuminate\Database\Seeder;

class Shop_Brands extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($b = 1; $b <= 12; $b++) {
            Brand::create(['name' => ucfirst($faker->unique()->word())]);
        }
    }
}
