<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add administrator role
        $role_employee = new Role();
        $role_employee->name = 'administrator';
        $role_employee->description = 'An administrator user that can do anything.';
        $role_employee->save();

        // Add moderator role
        $role_manager = new Role();
        $role_manager->name = 'moderator';
        $role_manager->description = 'A moderator user that can manage almost anything.';
        $role_manager->save();

        // Add member role
        $role_manager = new Role();
        $role_manager->name = 'member';
        $role_manager->description = 'A member user that can manage what he create.';
        $role_manager->save();
    }
}
