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
        Permission::create(['name' => 'user.show']);
        Permission::create(['name' => 'user.delete']);
        Permission::create(['name' => 'user.restore']);
        Permission::create(['name' => 'user.destroy']);

        // -- Character
        Permission::create(['name' => 'character']);
        Permission::create(['name' => 'character.create']);
        Permission::create(['name' => 'character.edit']);
        Permission::create(['name' => 'character.show']);
        Permission::create(['name' => 'character.delete']);
        Permission::create(['name' => 'character.restore']);
        Permission::create(['name' => 'character.destroy']);

        // Role & Permission
        // -- Role
        Permission::create(['name' => 'role']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.show']);
        Permission::create(['name' => 'role.assign']);
        Permission::create(['name' => 'role.revoke']);
        Permission::create(['name' => 'role.delete']);
        Permission::create(['name' => 'role.restore']);
        Permission::create(['name' => 'role.destroy']);

        // -- Permission
        Permission::create(['name' => 'permission']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.edit']);
        Permission::create(['name' => 'permission.show']);
        Permission::create(['name' => 'permission.assign']);
        Permission::create(['name' => 'permission.revoke']);
        Permission::create(['name' => 'permission.delete']);
        Permission::create(['name' => 'permission.restore']);
        Permission::create(['name' => 'permission.destroy']);

        // School
        Permission::create(['name' => 'school']);

        // -- Levels
        Permission::create(['name' => 'school.level']);
        Permission::create(['name' => 'school.level.create']);
        Permission::create(['name' => 'school.level.edit']);
        Permission::create(['name' => 'school.level.show']);
        Permission::create(['name' => 'school.level.delete']);
        Permission::create(['name' => 'school.level.restore']);
        Permission::create(['name' => 'school.level.destroy']);

        // -- Courses
        Permission::create(['name' => 'school.course']);
        Permission::create(['name' => 'school.course.create']);
        Permission::create(['name' => 'school.course.edit']);
        Permission::create(['name' => 'school.course.show']);
        Permission::create(['name' => 'school.course.delete']);
        Permission::create(['name' => 'school.course.restore']);
        Permission::create(['name' => 'school.course.destroy']);

        // -- Teachers
        Permission::create(['name' => 'school.teacher']);
        Permission::create(['name' => 'school.teacher.create']);
        Permission::create(['name' => 'school.teacher.edit']);
        Permission::create(['name' => 'school.teacher.show']);
        Permission::create(['name' => 'school.teacher.delete']);
        Permission::create(['name' => 'school.teacher.restore']);
        Permission::create(['name' => 'school.teacher.destroy']);

        // -- Students
        Permission::create(['name' => 'school.student']);
        Permission::create(['name' => 'school.student.create']);
        Permission::create(['name' => 'school.student.edit']);
        Permission::create(['name' => 'school.student.show']);
        Permission::create(['name' => 'school.student.delete']);
        Permission::create(['name' => 'school.student.restore']);
        Permission::create(['name' => 'school.student.destroy']);

        // -- Time (Schedule)
        Permission::create(['name' => 'school.time']);
        Permission::create(['name' => 'school.time.create']);
        Permission::create(['name' => 'school.time.edit']);
        Permission::create(['name' => 'school.time.show']);
        Permission::create(['name' => 'school.time.delete']);
        Permission::create(['name' => 'school.time.restore']);
        Permission::create(['name' => 'school.time.destroy']);

        $admin->givePermissionTo('user');
        $admin->givePermissionTo('character');
        $admin->givePermissionTo('role');
        $admin->givePermissionTo('permission');
        $admin->givePermissionTo('school');

        $teacher->givePermissionTo('school.time');
        $teacher->givePermissionTo('school.student.show');

        $student->givePermissionTo('school.course.show');
    }
}
