<?php

namespace Database\Seeders;

use App\Models\Shop\Section;
use Illuminate\Database\Seeder;

class ShopSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create(['id' => 1, 'name' => 'Food', 'status' => 1]);
        Section::create(['id' => 2, 'name' => 'Materials', 'status' => 1]);
        Section::create(['id' => 3, 'name' => 'Accessories', 'status' => 1]);
    }
}
