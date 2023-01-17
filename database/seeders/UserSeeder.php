<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[[
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('#admin123'),
            'address' => 'Jl. Kemanggisan No. 20',
            'gender' => 'Male',
            'role' => 'Admin'
        ],
        [
            'name' => 'George Umbrella',
            'email' => 'george.umbrella@gmail.com',
            'password' => Hash::make('#george123'),
            'address' => 'Jl. Umbrella Corp No. 112',
            'gender' => 'Male',
            'role' => 'Member'
        ]];

        User::insert($users);
    }
}
