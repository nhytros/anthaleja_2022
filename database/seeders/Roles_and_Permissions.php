<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Roles_and_Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $admin = Role::create(['name' => 'admin']);
        $gov = Role::create(['name' => 'government']);
        $staff = Role::create(['name' => 'staff']);
        $vendor = Role::create(['name' => 'vendor']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);
        $user = Role::create(['name' => 'user']);

        // Permissions
        // -- User
        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.delete']);
        Permission::create(['name' => 'user.restore']);
        Permission::create(['name' => 'user.destroy']);

        // -- Character
        Permission::create(['name' => 'character']);
        Permission::create(['name' => 'character.create']);
        Permission::create(['name' => 'character.edit']);
        Permission::create(['name' => 'character.delete']);
        Permission::create(['name' => 'character.restore']);
        Permission::create(['name' => 'character.destroy']);

        // School
        // -- Courses
        Permission::create(['name' => 'course']);
        Permission::create(['name' => 'course.create']);
        Permission::create(['name' => 'course.edit']);
        Permission::create(['name' => 'course.show']);
        Permission::create(['name' => 'course.delete']);
        Permission::create(['name' => 'course.restore']);
        Permission::create(['name' => 'course.destroy']);

        // -- Students
        Permission::create(['name' => 'student']);
        Permission::create(['name' => 'student.create']);
        Permission::create(['name' => 'student.edit']);
        Permission::create(['name' => 'student.show']);
        Permission::create(['name' => 'student.delete']);
        Permission::create(['name' => 'student.restore']);
        Permission::create(['name' => 'student.destroy']);

        $admin->givePermissionTo('user');
        $admin->givePermissionTo('character');
        $admin->givePermissionTo('course');
        $admin->givePermissionTo('student');

        $teacher->givePermissionTo('course.create');
        $teacher->givePermissionTo('course.edit');
        $teacher->givePermissionTo('course.show');
        $teacher->givePermissionTo('course.delete');
        $teacher->givePermissionTo('student.show');

        $student->givePermissionTo('course.show');
    }
}
