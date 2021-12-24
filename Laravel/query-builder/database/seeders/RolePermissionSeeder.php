<?php

namespace Database\Seeders;

use App\Models\RolePermission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
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
                'role_id' => 2,
                'permission_id' => 1,
                'user_id' => 2,
                'organization_id' => 1
            ],
            [
                'role_id' => 2,
                'permission_id' => 2,
                'user_id' => 2,
                'organization_id' => 1
            ],
            [
                'role_id' => 2,
                'permission_id' => 3,
                'user_id' => 2,
                'organization_id' => 1
            ],
            [
                'role_id' => 3,
                'permission_id' => 4,
                'user_id' => 3,
                'organization_id' => 1
            ],
            [
                'role_id' => 3,
                'permission_id' => 5,
                'user_id' => 3,
                'organization_id' => 1
            ],
            [
                'role_id' => 3,
                'permission_id' => 6,
                'user_id' => 3,
                'organization_id' => 1
            ],
            [
                'role_id' => 3,
                'permission_id' => 7,
                'user_id' => 3,
                'organization_id' => 1
            ],
            [
                'role_id' => 4,
                'permission_id' => 2,
                'user_id' => 4,
                'organization_id' => 1
            ],
            [
                'role_id' => 4,
                'permission_id' => 3,
                'user_id' => 4,
                'organization_id' => 1
            ],
            [
                'role_id' => 4,
                'permission_id' => 4,
                'user_id' => 4,
                'organization_id' => 1
            ],
            [
                'role_id' => 4,
                'permission_id' => 5,
                'user_id' => 4,
                'organization_id' => 1
            ],
            [
                'role_id' => 5,
                'permission_id' => 7,
                'user_id' => 5,
                'organization_id' => 1
            ],
            [
                'role_id' => 5,
                'permission_id' => 8,
                'user_id' => 5,
                'organization_id' => 1
            ],
            [
                'role_id' => 5,
                'permission_id' => 9,
                'user_id' => 5,
                'organization_id' => 1
            ],
            [
                'role_id' => 5,
                'permission_id' => 10,
                'user_id' => 5,
                'organization_id' => 1
            ],
            [
                'role_id' => 6,
                'permission_id' => 3,
                'user_id' => 6,
                'organization_id' => 1
            ],
            [
                'role_id' => 7,
                'permission_id' => 4,
                'user_id' => 6,
                'organization_id' => 1
            ],
            [
                'role_id' => 7,
                'permission_id' => 5,
                'user_id' => 6,
                'organization_id' => 1
            ],
            [
                'role_id' => 8,
                'permission_id' => 5,
                'user_id' => 7,
                'organization_id' => 1
            ],
            [
                'role_id' => 8,
                'permission_id' => 6,
                'user_id' => 7,
                'organization_id' => 1
            ],
            [
                'role_id' => 9,
                'permission_id' => 8,
                'user_id' => 8,
                'organization_id' => 1
            ],
            [
                'role_id' => 9,
                'permission_id' => 9,
                'user_id' => 8,
                'organization_id' => 1
            ],
            [
                'role_id' => 10,
                'permission_id' => 10,
                'user_id' => 9,
                'organization_id' => 1
            ],
            [
                'role_id' => 10,
                'permission_id' => 4,
                'user_id' => 9,
                'organization_id' => 1
            ],
            [
                'role_id' => 10,
                'permission_id' => 5,
                'user_id' => 10,
                'organization_id' => 1
            ],
            [
                'role_id' => 10,
                'permission_id' => 7,
                'user_id' => 10,
                'organization_id' => 1
            ],
            [
                'role_id' => 10,
                'permission_id' => 9,
                'user_id' => 10,
                'organization_id' => 1
            ],
            [
                'role_id' => 10,
                'permission_id' => 2,
                'user_id' => 10,
                'organization_id' => 1
            ],
            [
                'role_id' => 12,
                'permission_id' => 1,
                'user_id' => 11,
                'organization_id' => 2
            ],
            [
                'role_id' => 12,
                'permission_id' => 2,
                'user_id' => 11,
                'organization_id' => 2
            ],
            [
                'role_id' => 12,
                'permission_id' => 3,
                'user_id' => 11,
                'organization_id' => 2
            ],
            [
                'role_id' => 13,
                'permission_id' => 4,
                'user_id' => 12,
                'organization_id' => 2
            ],
            [
                'role_id' => 13,
                'permission_id' => 5,
                'user_id' => 12,
                'organization_id' => 2
            ],
            [
                'role_id' => 13,
                'permission_id' => 6,
                'user_id' => 12,
                'organization_id' => 2
            ],
            [
                'role_id' => 13,
                'permission_id' => 7,
                'user_id' => 12,
                'organization_id' => 2
            ],
            [
                'role_id' => 14,
                'permission_id' => 2,
                'user_id' => 13,
                'organization_id' => 2
            ],
            [
                'role_id' => 14,
                'permission_id' => 3,
                'user_id' => 13,
                'organization_id' => 2
            ],
            [
                'role_id' => 14,
                'permission_id' => 4,
                'user_id' => 13,
                'organization_id' => 2
            ],
            [
                'role_id' => 14,
                'permission_id' => 5,
                'user_id' => 13,
                'organization_id' => 2
            ],
            [
                'role_id' => 15,
                'permission_id' => 7,
                'user_id' => 14,
                'organization_id' => 2
            ],
            [
                'role_id' => 15,
                'permission_id' => 8,
                'user_id' => 14,
                'organization_id' => 2
            ],
            [
                'role_id' => 15,
                'permission_id' => 9,
                'user_id' => 14,
                'organization_id' => 2
            ],
            [
                'role_id' => 15,
                'permission_id' => 10,
                'user_id' => 14,
                'organization_id' => 2
            ],
            [
                'role_id' => 16,
                'permission_id' => 3,
                'user_id' => 15,
                'organization_id' => 2
            ],
            [
                'role_id' => 17,
                'permission_id' => 4,
                'user_id' => 15,
                'organization_id' => 2
            ],
            [
                'role_id' => 17,
                'permission_id' => 5,
                'user_id' => 15,
                'organization_id' => 2
            ],
            [
                'role_id' => 18,
                'permission_id' => 5,
                'user_id' => 16,
                'organization_id' => 2
            ],
            [
                'role_id' => 18,
                'permission_id' => 6,
                'user_id' => 16,
                'organization_id' => 2
            ],
            [
                'role_id' => 19,
                'permission_id' => 8,
                'user_id' => 17,
                'organization_id' => 2
            ],
            [
                'role_id' => 19,
                'permission_id' => 9,
                'user_id' => 17,
                'organization_id' => 2
            ],
            [
                'role_id' => 20,
                'permission_id' => 10,
                'user_id' => 18,
                'organization_id' => 2
            ],
            [
                'role_id' => 20,
                'permission_id' => 4,
                'user_id' => 18,
                'organization_id' => 2
            ],
            [
                'role_id' => 20,
                'permission_id' => 5,
                'user_id' => 19,
                'organization_id' => 2
            ],
            [
                'role_id' => 20,
                'permission_id' => 7,
                'user_id' => 19,
                'organization_id' => 2
            ],
            [
                'role_id' => 20,
                'permission_id' => 9,
                'user_id' => 19,
                'organization_id' => 2
            ],
            [
                'role_id' => 20,
                'permission_id' => 2,
                'user_id' => 19,
                'organization_id' => 2
            ],
            [
                'role_id' => 21,
                'permission_id' => 1,
                'user_id' => 2,
                'organization_id' => 3
            ],
            [
                'role_id' => 21,
                'permission_id' => 2,
                'user_id' => 2,
                'organization_id' => 3
            ],
            [
                'role_id' => 21,
                'permission_id' => 3,
                'user_id' => 2,
                'organization_id' => 3
            ],
            [
                'role_id' => 22,
                'permission_id' => 4,
                'user_id' => 3,
                'organization_id' => 3
            ],
            [
                'role_id' => 22,
                'permission_id' => 5,
                'user_id' => 3,
                'organization_id' => 3
            ],
            [
                'role_id' => 22,
                'permission_id' => 6,
                'user_id' => 3,
                'organization_id' => 3
            ],
            [
                'role_id' => 22,
                'permission_id' => 7,
                'user_id' => 3,
                'organization_id' => 3
            ],
            [
                'role_id' => 23,
                'permission_id' => 2,
                'user_id' => 4,
                'organization_id' => 3
            ],
            [
                'role_id' => 23,
                'permission_id' => 3,
                'user_id' => 4,
                'organization_id' => 3
            ],
            [
                'role_id' => 23,
                'permission_id' => 4,
                'user_id' => 4,
                'organization_id' => 3
            ],
            [
                'role_id' => 23,
                'permission_id' => 5,
                'user_id' => 4,
                'organization_id' => 3
            ],
            [
                'role_id' => 24,
                'permission_id' => 7,
                'user_id' => 5,
                'organization_id' => 3
            ],
            [
                'role_id' => 24,
                'permission_id' => 8,
                'user_id' => 5,
                'organization_id' => 3
            ],
            [
                'role_id' => 24,
                'permission_id' => 9,
                'user_id' => 5,
                'organization_id' => 3
            ],
            [
                'role_id' => 24,
                'permission_id' => 10,
                'user_id' => 5,
                'organization_id' => 3
            ],
            [
                'role_id' => 25,
                'permission_id' => 3,
                'user_id' => 6,
                'organization_id' => 3
            ],
            [
                'role_id' => 25,
                'permission_id' => 4,
                'user_id' => 6,
                'organization_id' => 3
            ],
            [
                'role_id' => 26,
                'permission_id' => 5,
                'user_id' => 6,
                'organization_id' => 3
            ],
            [
                'role_id' => 27,
                'permission_id' => 5,
                'user_id' => 7,
                'organization_id' => 3
            ],
            [
                'role_id' => 27,
                'permission_id' => 6,
                'user_id' => 7,
                'organization_id' => 3
            ],
            [
                'role_id' => 28,
                'permission_id' => 8,
                'user_id' => 8,
                'organization_id' => 3
            ],
            [
                'role_id' => 28,
                'permission_id' => 9,
                'user_id' => 8,
                'organization_id' => 3
            ],
            [
                'role_id' => 29,
                'permission_id' => 10,
                'user_id' => 9,
                'organization_id' => 3
            ],
            [
                'role_id' => 29,
                'permission_id' => 4,
                'user_id' => 9,
                'organization_id' => 3
            ],
            [
                'role_id' => 29,
                'permission_id' => 5,
                'user_id' => 10,
                'organization_id' => 3
            ],
            [
                'role_id' => 29,
                'permission_id' => 7,
                'user_id' => 10,
                'organization_id' => 3
            ],
            [
                'role_id' => 29,
                'permission_id' => 9,
                'user_id' => 10,
                'organization_id' => 3
            ],
            [
                'role_id' => 30,
                'permission_id' => 2,
                'user_id' => 10,
                'organization_id' => 3
            ],
        ];

        RolePermission::insert($permissions);
    }
}
