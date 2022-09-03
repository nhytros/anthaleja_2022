<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Shop\{Product, ProductImage};


class Shop_Product_Images extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $pc = Product::count();
        for ($i = 1; $i <= $pc; $i++) {
            ProductImage::create([
                'product_id' => $i,
                'image' => $faker->imageUrl(800, 600, null, true, null, false, 'jpg'),
            ]);
        }
    }
}
