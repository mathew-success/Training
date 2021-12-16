<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class AdminRoleUserSeeder extends Seeder
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
                'user_id' => 1,
                'role_id' => 1
            ]
        ];

        RoleUser::insert($permissions);
    }
}
