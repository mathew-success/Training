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
        User::create([
            'id' => 1,
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'phone_no' => '9876543212',
            'password' => Hash::make('12345678'),
            'organization_id' => 1
        ]);
    }
}
