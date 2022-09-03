<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class School_Levels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolLevel::create(['name' => 'Nursery Grade 0', 'description' => 'from 6 months to 1 year']);
        SchoolLevel::create(['name' => 'Nursery Grade 1', 'description' => 'from 1 to 2 years']);
        SchoolLevel::create(['name' => 'Nursery Grade 2', 'description' => 'from 2 to 3 years']);
        SchoolLevel::create(['name' => 'Nursery Grade 3', 'description' => 'from 3 to 4 years']);
        SchoolLevel::create(['name' => 'Preparatory Grade 1', 'description' => 'from 4 to 5 years']);
        SchoolLevel::create(['name' => 'Preparatory Grade 2', 'description' => 'from 5 to 6 years']);
        SchoolLevel::create(['name' => 'Elementary Grade 1', 'description' => '6 years born >1/12 < 24/18']);
        SchoolLevel::create(['name' => 'Elementary Grade 2', 'description' => '7 years;
        SchoolLevel::create(['name' => 'Elementary Grade 3', 'description' => '8 years;
        SchoolLevel::create(['name' => 'Elementary Grade 4', 'description' => '9 years;
        SchoolLevel::create(['name' => 'Elementary Grade 5', 'description' => '10 years;
        SchoolLevel::create(['name' => 'Elementary', 'description' => '6 years born >1/12 < 24/18']);
        SchoolLevel::create(['name' => 'Junior School', 'description' => '11-13 years']);
        SchoolLevel::create(['name' => 'High School', 'description' => '14-16 years']);
        SchoolLevel::create(['name' => 'College', 'description' => '16-18 years']);
        SchoolLevel::create(['name' => 'University', 'description' => '18-21 years']);
        SchoolLevel::create(['name' => 'Graduate', 'description' => '>21 years']);
    }
}
