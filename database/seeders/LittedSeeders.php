<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Character;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Litted\Community;
use App\Models\Litted\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LittedSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $chars = Character::count();

        for ($c = 1; $c <= rand(12, 48); $c++) {
            Community::create([
                'owner_id' => $faker->numberBetween(1, $chars),
                'name' => $name = ucfirst($faker->unique()->word()),
                'slug' => Str::slug($name),
                'description' => $faker->paragraph(),
            ]);
        }
        $ccount = Community::count();

        for ($p = 1; $p <= 504; $p++) {
            Post::create([
                'author_id' => $faker->numberBetween(1, $chars),
                'community_id' => $faker->numberBetween(1, $ccount),
                'title' => $title = $faker->unique()->sentence(),
                'slug' => Str::slug($title),
                'url' => $faker->boolean(15) ? $faker->freeEmailDomain() : null,
                'body' => $faker->paragraphs(rand(1, 5), true),
                'created_at' => $faker->dateTimeBetween('-1 week', '+1 week'),
            ]);
        }
    }
}
