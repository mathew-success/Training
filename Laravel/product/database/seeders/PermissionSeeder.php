<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'user.create',
                'organization_id' => 1,
            ],
            [
                'name' => 'user.index',
                'organization_id' => 1,
            ],
            [
                'name' => 'user.edit',
                'organization_id' => 1,
            ],
            [
                'name' => 'user.show',
                'organization_id' => 1,
            ],
            [
                'name' => 'user.delete',
                'organization_id' => 1,
            ],
            [
                'name' => 'organization.create',
                'organization_id' => 1,
            ],
            [
                'name' => 'organization.index',
                'organization_id' => 1,
            ],
            [
                'name' => 'organization.edit',
                'organization_id' => 1,
            ],
            [
                'name' => 'organization.show',
                'organization_id' => 1,
            ],
            [
                'name' => 'organization.delete',
                'organization_id' => 1,
            ],
            [
                'name' => 'role.create',
                'organization_id' => 1,
            ],
            [
                'name' => 'role.index',
                'organization_id' => 1,
            ],
            [
                'name' => 'role.edit',
                'organization_id' => 1,
            ],
            [
                'name' => 'role.show',
                'organization_id' => 1,
            ],
            [
                'name' => 'role.delete',
                'organization_id' => 1,
            ]
        ];

        Permission::insert($permissions);
    }
}
