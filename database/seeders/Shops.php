<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Character;
use App\Models\Shop\Shop;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class Shops extends Seeder
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
