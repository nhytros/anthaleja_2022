<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class Permissions_Portfolio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Portfolio Permissions
        $this->command->getOutput()->writeln("<info>*** Portfolio Permissions...</info>");
        Permission::create(['name' => 'portfolio']);

        // -- Skills
        $this->command->getOutput()->writeln("<info>***** Skills</info>");
        Permission::create(['name' => 'portfolio.skill']);
        Permission::create(['name' => 'portfolio.skill.create']);
        Permission::create(['name' => 'portfolio.skill.edit']);
        Permission::create(['name' => 'portfolio.skill.delete']);
        Permission::create(['name' => 'portfolio.skill.restore']);
        Permission::create(['name' => 'portfolio.skill.destroy']);

        // -- Projects
        $this->command->getOutput()->writeln("<info>***** Projects</info>");
        Permission::create(['name' => 'portfolio.project']);
        Permission::create(['name' => 'portfolio.project.create']);
        Permission::create(['name' => 'portfolio.project.edit']);
        Permission::create(['name' => 'portfolio.project.delete']);
        Permission::create(['name' => 'portfolio.project.restore']);
        Permission::create(['name' => 'portfolio.project.destroy']);
    }
}
