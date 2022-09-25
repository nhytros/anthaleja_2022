<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->getOutput()->writeln("<info>Cleaning uploads folders...</info>");
        exec('rm -rf public/storage/uploads/*');
        $this->command->getOutput()->writeln("<info>DONE</info>");

        $this->call([
            // Users, Characters, Roles and Permissions
            Roles_and_Permissions::class,
            Users_and_Characters::class,

            // Shop Seeders (all-in-one)
            // Shop::class,

            // School Seeders (all-in-one)
            School::class,

            // Wiki::class,
            // LittedSeeders::class,

        ]);
        $this->command->getOutput()->writeln("<info>DONE</info>");
    }
}
