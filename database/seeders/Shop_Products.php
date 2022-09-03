<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Shop\{Shop, Brand, Product, Section, Category};

class Shop_Products extends Seeder
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
        $c = Category::count();
        $b = Brand::count();
        $v = Shop::count();
        for ($p = 1; $p <= 504; $p++) {
            $data[] = [
                'section_id' => $faker->numberBetween(1, $s),
                'category_id' => $faker->numberBetween(1, $c),
                'brand_id' => $faker->numberBetween(1, $b),
                'vendor_id' => $faker->numberBetween(1, $v),
                'name' => $name = 'Article #' . $p,
                'code' => $faker->unique()->numerify('A' . $p . '-####'),
                'color' => ($faker->boolean(10) ? $faker->colorName() : null),
                'price' => $faker->numberBetween(100, 19999) / 100,
                'discount' => ($faker->boolean(10) ? $faker->randomElement([5, 10, 15, 20, 25, 30, 35, 40, 45, 50]) : null),
                'weight' => ($faker->boolean(50) ? $faker->numberBetween(50, 200) : null),
                'main_image' => $faker->imageUrl(800, 600, null, true, null, false, 'jpg'),
                'video' => null,
                'description' => $desc = $faker->paragraphs(6, true),
                'meta_title' => $name,
                'meta_description' => null,
                'meta_keywords' => $faker->words(12, true),
                'is_featured' => $faker->boolean(5),
                'status' => 1,
            ];
        }
        foreach (array_chunk($data, 144) as $chunk) {
            Product::insert($chunk);
        }
    }
}
