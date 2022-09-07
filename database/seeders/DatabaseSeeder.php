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
            // Users, Characters, Roles and Permissions
            Roles_and_Permissions::class,
            Users_and_Characters::class,

            // Shop Seeders
            // Shops::class,
            // Shop_Banners::class,
            // Shop_Sections::class,
            // Shop_Categories::class,
            // Shop_Brands::class,
            // Shop_Products::class,
            // Shop_Product_Attributes::class,

            // School Seeders (all-in-one)
            School::class,

            // Wiki::class,
            // LittedSeeders::class,

        ]);
        $this->command->getOutput()->writeln("<info>DONE</info>");
    }
}
