<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Shop\{Product, ProductAttribute};

class ProductAttributesTableSeeder extends Seeder
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
        $sizes = ['XS' => .90, 'S' => .95, 'M' => 1, 'L' => 1.05, 'XL' => 1.10, 'XXL' => 1.15];
        for ($a = 1; $a <= $pc; $a++) {
            if ($faker->boolean(25)) {
                $p = Product::where('id', $a)->first();
                foreach ($sizes as $size => $pm) {
                    ProductAttribute::create([
                        'product_id' => $p->id,
                        'size' => $size,
                        'price' => $p->price * $pm,
                        'stock' => $faker->numberBetween(12, 144),
                        'sku' => $p->code . '-' . $size,
                        'status' => 1,
                    ]);
                }
            } else {
                $a++;
            }
        }
    }
}
