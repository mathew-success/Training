<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'id' => 2,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678')
            ]
        ];

        User::insert($users);
    }
}
