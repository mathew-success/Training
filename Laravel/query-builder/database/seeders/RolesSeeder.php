<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Role 11',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 12',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 13',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 14',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 15',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 16',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 17',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 18',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 19',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 20',
                'organization_id' => 2
            ],
            [
                'name' => 'Role 21',
                'organization_id' => 3
            ],
            [
                'name' => 'Role 22',
                'organization_id' => 3
            ],
            [
                'name' => 'Role 23',
                'organization_id' => 3
            ],
            [
                'name' => 'Role 24',
                'organization_id' => 3
            ],
            [
                'name' => 'Role 25',
                'organization_id' => 3
            ],
            [
                'name' => 'Role 26',
                'organization_id' => 3
            ],
            [
                'name' => 'Role 27',
                'organization_id' => 3
            ],
            [
                'name' => 'Role 28',
                'organization_id' => 3
            ],
            [
                'name' => 'Role 29',
                'organization_id' => 3
            ],
            [
                'name' => 'Role 30',
                'organization_id' => 3
            ]
        ];

        Role::insert($roles);
    }
}
