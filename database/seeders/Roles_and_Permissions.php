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
        $admin = Role::create(['name' => 'admin', 'priority' => -24]);
        $gov = Role::create(['name' => 'governor', 'priority' => -12]);
        $staff = Role::create(['name' => 'staff', 'priority' => -6]);
        $vendor = Role::create(['name' => 'vendor']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);
        $doctor = Role::create(['name' => 'doctor']);
        $nurse = Role::create(['name' => 'nurse']);
        $pharmacy = Role::create(['name' => 'pharmacy']);
        $accountant = Role::create(['name' => 'accountant']);
        $sales = Role::create(['name' => 'sales']);
        $patient = Role::create(['name' => 'patient']);
        $user = Role::create(['name' => 'user']);

        // Permissions
        // -- User
        $this->command->getOutput()->writeln("<info>*** User Permissions...</info>");
        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.show']);
        Permission::create(['name' => 'user.delete']);
        Permission::create(['name' => 'user.restore']);
        Permission::create(['name' => 'user.destroy']);

        // -- Character
        $this->command->getOutput()->writeln("<info>*** Character Permissions...</info>");
        Permission::create(['name' => 'character']);
        Permission::create(['name' => 'character.create']);
        Permission::create(['name' => 'character.edit']);
        Permission::create(['name' => 'character.show']);
        Permission::create(['name' => 'character.delete']);
        Permission::create(['name' => 'character.restore']);
        Permission::create(['name' => 'character.destroy']);

        // Role & Permission
        // -- Role
        $this->command->getOutput()->writeln("<info>*** Role Permissions...</info>");
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
        $this->command->getOutput()->writeln("<info>*** Permissions for Permissions...</info>");
        Permission::create(['name' => 'permission']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.edit']);
        Permission::create(['name' => 'permission.show']);
        Permission::create(['name' => 'permission.assign']);
        Permission::create(['name' => 'permission.revoke']);
        Permission::create(['name' => 'permission.delete']);
        Permission::create(['name' => 'permission.restore']);
        Permission::create(['name' => 'permission.destroy']);

        $this->call([
            Permissions_School::class,
            Permissions_Hospital::class,
            Permissions_Portfolio::class,
        ]);

        // $this->command->getOutput()->writeln("<info>Generating Permissions...</info>");
        // if ($role->name === 'Admin') {
        //     $role->syncPermissions(Permission::all());
        // }

        $admin->givePermissionTo('user');
        $admin->givePermissionTo('character');
        $admin->givePermissionTo('role');
        $admin->givePermissionTo('permission');
        $admin->givePermissionTo('school');
        $admin->givePermissionTo('hospital');
        $admin->givePermissionTo('portfolio');

        $gov->givePermissionTo('portfolio');

        $teacher->givePermissionTo('school.time');
        $teacher->givePermissionTo('school.student.show');
        $teacher->givePermissionTo('portfolio.project.create');
        $teacher->givePermissionTo('portfolio.project.edit');

        $student->givePermissionTo('school.course.show');

        $doctor->givePermissionTo('hospital.patient.show');
        $doctor->givePermissionTo('hospital.patient.export');
        $doctor->givePermissionTo('portfolio.project.create');
        $doctor->givePermissionTo('portfolio.project.edit');

        $nurse->givePermissionTo('hospital.patient.show');
        $nurse->givePermissionTo('portfolio.project.create');
        $nurse->givePermissionTo('portfolio.project.edit');
    }
}
