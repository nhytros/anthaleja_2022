<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(['name' => 'Wheat', 'weight' => 50]);
        Item::create(['name' => 'Bread',  'weight' => 150]);
        Item::create(['name' => 'Cake', 'weight' => 660]);
        Item::create(['name' => 'Milk', 'weight' => 100]);
        Item::create(['name' => 'Sugar', 'weight' => 100]);
        Item::create(['name' => 'Egg', 'weight' => 10]);
        Item::create(['name' => 'Cookie', 'weight' => 150]);
        Item::create(['name' => 'Cocoa', 'weight' => 50]);
        Item::create(['name' => 'Pumpkin Pie', 'weight' => 310]);
        Item::create(['name' => 'Pumpkin', 'weight' => 200]);
        Item::create(['name' => 'Water', 'weight' => 500]);
    }
}
