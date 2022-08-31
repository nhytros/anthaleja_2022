<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'government']);
        Role::create(['name' => 'vendor']);
        Role::create(['name' => 'user']);

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
    }
}
