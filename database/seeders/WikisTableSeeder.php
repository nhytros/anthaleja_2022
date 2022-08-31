<?php

namespace Database\Seeders;

use App\Models\Wiki;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WikisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wiki::create(
            [
                'character_id' => 1,
                'title' => 'Main Page',
                'slug' => 'main-page',
                'body' => 'Tenji jita main page.'
            ]
        );
    }
}
