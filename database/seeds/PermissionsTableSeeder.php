<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Admin */
        Bouncer::allow('administrator')->to('view-users');
        Bouncer::allow('administrator')->to('view-roles');
        Bouncer::allow('administrator')->to('view-abilities');
        Bouncer::allow('administrator')->to('view-menu');
        Bouncer::allow('administrator')->to('view-pages');
        Bouncer::allow('administrator')->to('create-users');
        Bouncer::allow('administrator')->to('create-roles');
        Bouncer::allow('administrator')->to('create-abilities');
        Bouncer::allow('administrator')->to('create-menu');
        Bouncer::allow('administrator')->to('create-pages');
        Bouncer::allow('administrator')->to('manage-users');
        Bouncer::allow('administrator')->to('manage-roles');
        Bouncer::allow('administrator')->to('manage-abilities');
        Bouncer::allow('administrator')->to('manage-menu');
        Bouncer::allow('administrator')->to('manage-pages');
        Bouncer::allow('administrator')->to('edit-users');
        Bouncer::allow('administrator')->to('edit-roles');
        Bouncer::allow('administrator')->to('manage-user-roles');
        Bouncer::allow('administrator')->to('manage-role-abilities');

        /* Moderator */
        Bouncer::allow('moderator')->to('view-users');
        Bouncer::allow('moderator')->to('view-roles');
        Bouncer::allow('moderator')->to('view-abilities');
        Bouncer::allow('moderator')->to('view-menu');
        Bouncer::allow('moderator')->to('view-pages');
        Bouncer::allow('moderator')->to('create-users');
        Bouncer::allow('moderator')->to('create-roles');
        Bouncer::allow('moderator')->to('create-abilities');
        Bouncer::allow('moderator')->to('create-pages');
        Bouncer::allow('moderator')->to('edit-users');
        Bouncer::allow('moderator')->to('edit-roles');

        /* Guest */
        Bouncer::allow('guest')->to('view-users');
        Bouncer::allow('guest')->to('view-roles');
        Bouncer::allow('guest')->to('view-abilities');
        Bouncer::allow('guest')->to('view-menu');
        Bouncer::allow('guest')->to('view-pages');
    }
}
