<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Shop\Banner;
use Illuminate\Database\Seeder;

class ShopBannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($b = 1; $b <= rand(3, 12); $b++) {
            Banner::create([
                'image' => $faker->imageUrl(1400, 400, null, true, null, false, 'jpg'),
                'link' => $faker->domainName(),
                'title' => $faker->sentence(3),
                'alt' => $faker->sentence(3),
                'status' => $faker->boolean(75),
            ]);
        }
    }
}
