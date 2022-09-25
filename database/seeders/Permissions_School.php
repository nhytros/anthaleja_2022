<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Permissions_School extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // School Permissions
        $this->command->getOutput()->writeln("<info>*** School Permissions</info>");
        Permission::create(['name' => 'school']);

        // -- Levels
        $this->command->getOutput()->writeln("<info>***** Levels</info>");
        Permission::create(['name' => 'school.level']);
        Permission::create(['name' => 'school.level.create']);
        Permission::create(['name' => 'school.level.edit']);
        Permission::create(['name' => 'school.level.show']);
        Permission::create(['name' => 'school.level.delete']);
        Permission::create(['name' => 'school.level.restore']);
        Permission::create(['name' => 'school.level.destroy']);

        // -- Courses
        $this->command->getOutput()->writeln("<info>***** Courses</info>");
        Permission::create(['name' => 'school.course']);
        Permission::create(['name' => 'school.course.create']);
        Permission::create(['name' => 'school.course.edit']);
        Permission::create(['name' => 'school.course.show']);
        Permission::create(['name' => 'school.course.delete']);
        Permission::create(['name' => 'school.course.restore']);
        Permission::create(['name' => 'school.course.destroy']);

        // -- Teachers
        $this->command->getOutput()->writeln("<info>***** Teachers</info>");
        Permission::create(['name' => 'school.teacher']);
        Permission::create(['name' => 'school.teacher.create']);
        Permission::create(['name' => 'school.teacher.edit']);
        Permission::create(['name' => 'school.teacher.show']);
        Permission::create(['name' => 'school.teacher.delete']);
        Permission::create(['name' => 'school.teacher.restore']);
        Permission::create(['name' => 'school.teacher.destroy']);

        // -- Students
        $this->command->getOutput()->writeln("<info>***** Students</info>");
        Permission::create(['name' => 'school.student']);
        Permission::create(['name' => 'school.student.create']);
        Permission::create(['name' => 'school.student.edit']);
        Permission::create(['name' => 'school.student.show']);
        Permission::create(['name' => 'school.student.delete']);
        Permission::create(['name' => 'school.student.restore']);
        Permission::create(['name' => 'school.student.destroy']);

        // -- Time (Schedule)
        $this->command->getOutput()->writeln("<info>***** Time</info>");
        Permission::create(['name' => 'school.time']);
        Permission::create(['name' => 'school.time.create']);
        Permission::create(['name' => 'school.time.edit']);
        Permission::create(['name' => 'school.time.show']);
        Permission::create(['name' => 'school.time.delete']);
        Permission::create(['name' => 'school.time.restore']);
        Permission::create(['name' => 'school.time.destroy']);
    }
}
