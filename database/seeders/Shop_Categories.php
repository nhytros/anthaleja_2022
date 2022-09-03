<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Shop\{Section, Category};
use Illuminate\Database\Seeder;

class Shop_Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $s = Section::count();

        for ($b = 1; $b <= 12; $b++) {
            Category::create([
                'parent_id' => 0,
                'section_id' => $faker->numberBetween(1, $s),
                'name' => ucfirst($faker->unique()->word()),
            ]);
        }
    }
}
