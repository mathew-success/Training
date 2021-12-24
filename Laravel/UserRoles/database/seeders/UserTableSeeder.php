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
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Sam',
                'email' => 'sam@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Guna',
                'email' => 'guna@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Stark',
                'email' => 'stark@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Chris',
                'email' => 'chris@gmail.com',
                'password' => Hash::make('12345678')
            ],
        ];

        User::insert($users);
    }
}
