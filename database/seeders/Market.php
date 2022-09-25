<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use App\Models\Market\Section;
use Illuminate\Database\Seeder;
use App\Models\{User, Character};

class Market extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $cchars = Character::count();
        $nshops = rand(3, $cchars);
        for ($s = 1; $s <= $nshops; $s++) {
            $shop = Shop::create([
                'character_id' => $faker->unique()->numberBetween(1, $cchars),
                'name' => $name = $faker->unique()->company(),
                'website' => Str::slug($name, $faker->randomElement(['', '-'])) . '.ath',
                'bank_account' => 'ATH-' . $faker->unique()->numberBetween(44444444, 66666666),
                'bank_amount' => 0,
                'license_number' => self::genLicence($faker->unique()->numberBetween(1000000, 9999999)),
            ]);
            $character = Character::where('id', $shop->character_id)->first();
            $user = User::where('id', $character->user_id)->first()->assignRole('vendor');
        }

        // Sections
        Section::create(['id' => 1, 'name' => 'Food', 'status' => 1]);
        Section::create(['id' => 2, 'name' => 'Materials', 'status' => 1]);
        Section::create(['id' => 3, 'name' => 'Accessories', 'status' => 1]);

        // Categories
        $s = Section::count();
        for ($b = 1; $b <= 12; $b++) {
            Category::create([
                'parent_id' => 0,
                'section_id' => $faker->numberBetween(1, $s),
                'name' => ucfirst($faker->unique()->word()),
            ]);
        }

        // Brands
        for ($b = 1; $b <= 12; $b++) {
            Brand::create(['name' => ucfirst($faker->unique()->word())]);
        }

        // Products
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

        // Product Attributes
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
            // Products Images
            for ($i = 1; $i <= $pc; $i++) {
                ProductImage::create([
                    'product_id' => $i,
                    'image' => $faker->imageUrl(800, 600, null, true, null, false, 'jpg'),
                ]);
            }
        }

        // Banners
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



    private function genLicence($n)
    {
        $even = '';
        $odd = '';
        $sum_odds = 0;
        $sum_evens = 0;
        $n .= '139';
        for ($c = 0; $c < strlen($n); $c++) {
            if ($c % 2 == 0) {
                $even .= $n[$c];
            } else {
                $odd .= $n[$c];
            }
        }
        $odds = str_split($odd);
        $evens = str_split($even);
        $sum_odds = $odds[0] + $odds[1] + $odds[2] + $odds[3] + $odds[4];
        $sum_evens += ($evens[0] * 2 > 9 ? ($evens[0] * 2) - 9 : $evens[0] * 2) +
            ($evens[1] * 2 > 9 ? ($evens[1] * 2) - 9 : $evens[1] * 2) +
            ($evens[2] * 2 > 9 ? ($evens[2] * 2) - 9 : $evens[2] * 2) +
            ($evens[3] * 2 > 9 ? ($evens[3] * 2) - 9 : $evens[3] * 2) +
            ($evens[4] * 2 > 9 ? ($evens[4] * 2) - 9 : $evens[4] * 2);
        $sum_all = $sum_odds + $sum_evens;
        $div = $sum_all % 10;
        $check = ($div == 0) ? 0 : 10 - $div;
        return $n . $check;
    }
}
