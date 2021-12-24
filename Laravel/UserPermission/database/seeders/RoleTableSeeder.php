<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Super Admin'
            ],
            [
                'id' => 2,
                'name' => 'Admin'
            ]
        ];

        Role::insert($roles);
    }
}
