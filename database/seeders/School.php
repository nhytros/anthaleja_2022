<?php

namespace Database\Seeders;

use App\Models\School\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class School extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Levels

        // Grades
        SchoolGrade::create(['name' => 'Nursery', 'description' => '0-3 years']);
        SchoolGrade::create(['name' => 'Pre-School', 'description' => '4-5 years']);
        SchoolGrade::create(['name' => 'Elementary', 'description' => '6-11 years']);
        SchoolGrade::create(['name' => 'Secondary Grade 1', 'description' => '12-16 years']);
        SchoolGrade::create(['name' => 'Secondary Grade 2', 'description' => '17-19 years']);

        // Courses
        Course::create([]);
    }
}
