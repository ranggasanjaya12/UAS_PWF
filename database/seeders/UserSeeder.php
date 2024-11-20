<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'           => 'admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('123'),
                'level'          => 'admin',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
