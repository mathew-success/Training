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
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Alex',
                'email' => 'alex@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Sathish',
                'email' => 'sathish@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Ram',
                'email' => 'ram@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Arun',
                'email' => 'arun@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Sam',
                'email' => 'sam@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Jude',
                'email' => 'jude@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Danie',
                'email' => 'danie@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Yazar',
                'email' => 'yazar@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Mathan',
                'email' => 'mathan@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ];

        User::insert($users);
    }
}
