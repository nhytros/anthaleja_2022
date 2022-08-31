<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersAndCharactersTableSeeder::class,
            // ItemsTableSeeder::class,
            // WikisTableSeeder::class,

            // Shop Seeders
            ShopsTableSeeder::class,
            ShopSectionsTableSeeder::class,
            ShopCategoriesTableSeeder::class,
            ShopBrandsTableSeeder::class,
            ShopProductsTableSeeder::class,
            ProductAttributesTableSeeder::class,
            ShopBannersTableSeeder::class,
            // LittedSeeders::class,
        ]);
    }
}
