<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class
        ]);

        \App\Models\Organization::factory(3)->create();
        \App\Models\Workspace::factory(3)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Permission::factory(10)->create();
        \App\Models\Project::factory(30)->create();
        \App\Models\Role::factory(10)->create();

        $this->call([
            RolesSeeder::class,
            AdminRolePermissionSeeder::class,
            RolePermissionSeeder::class,
            ProjectUsersSeeder::class,
            TaskSeeder::class
        ]);
    }
}