<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'administrator','title' => 'Administrator'],
            ['name' => 'moderator','title' => 'Moderator'],
            ['name' => 'user','title' => 'User'],
            ['name' => 'guest','title' => 'Guest'],
        ];

        DB::table('roles')->insert($roles);
    }
}
