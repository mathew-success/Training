<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Create'
            ],
            [
                'id' => 2,
                'name' => 'View'
            ],
            [
                'id' => 3,
                'name' => 'Store'
            ],
            [
                'id' => 4,
                'name' => 'Edit'
            ],
            [
                'id' => 5,
                'name' => 'Show'
            ],
            [
                'id' => 6,
                'name' => 'Delete'
            ]
        ];

        Permission::insert($permissions);
    }
}
