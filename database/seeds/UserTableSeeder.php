<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrive all roles
        $administratorRole = Role::where('name', 'administrator')->first();
        $moderatorRole  = Role::where('name', 'moderator')->first();
        $memberRole  = Role::where('name', 'member')->first();

        // Add administrator user
        $employee = new User();
        $employee->name = 'administrator';
        $employee->email = 'administrator@administrator.fr';
        $employee->password = bcrypt('administrator');
        $employee->save();
        $employee->roles()->attach($administratorRole);

        // Add moderator user
        $manager = new User();
        $manager->name = 'moderator';
        $manager->email = 'moderator@moderator.fr';
        $manager->password = bcrypt('moderator');
        $manager->save();
        $manager->roles()->attach($moderatorRole);

        // Add member user
        $manager = new User();
        $manager->name = 'member';
        $manager->email = 'member@member.fr';
        $manager->password = bcrypt('member');
        $manager->save();
        $manager->roles()->attach($memberRole);

        // Add no name user
        $manager = new User();
        $manager->name = 'noname';
        $manager->email = 'noname@noname.fr';
        $manager->password = bcrypt('noname');
        $manager->save();
        $manager->roles()->attach($memberRole);

        // Add John doe user
        $manager = new User();
        $manager->name = 'john doe';
        $manager->email = 'john@doe.fr';
        $manager->password = bcrypt('johndoe');
        $manager->save();
        $manager->roles()->attach($memberRole);
    }
}
