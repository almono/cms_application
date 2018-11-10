<?php

use Illuminate\Database\Seeder;
use App\Ability;

class AbilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abilities = [
            ['name' => 'view-users','title' => 'View users'],
            ['name' => 'view-roles','title' => 'View roles'],
            ['name' => 'view-abilities','title' => 'View abilities'],
            ['name' => 'view-menu','title' => 'View menu'],
            ['name' => 'view-pages','title' => 'View pages'],

            ['name' => 'create-users','title' => 'Create users'],
            ['name' => 'create-roles','title' => 'Create roles'],
            ['name' => 'create-abilities','title' => 'Create abilities'],
            ['name' => 'create-menu','title' => 'Create menu'],
            ['name' => 'create-pages','title' => 'Create pages'],

            ['name' => 'manage-users','title' => 'Manage users'],
            ['name' => 'manage-roles','title' => 'Manage roles'],
            ['name' => 'manage-abilities','title' => 'Manage abilities'],
            ['name' => 'manage-menu','title' => 'Manage menu'],
            ['name' => 'manage-pages','title' => 'Manage pages'],

            ['name' => 'edit-users','title' => 'Edit users'],
            ['name' => 'edit-roles','title' => 'Edit roles'],

            ['name' => 'manage-user-roles','title' => 'Manage user roles'],
            ['name' => 'manage-role-abilities','title' => 'Manage role abilities']
        ];

        DB::table('abilities')->insert($abilities);
    }
}
