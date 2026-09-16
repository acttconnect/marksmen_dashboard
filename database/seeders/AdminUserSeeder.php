<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(

            [
                'email' => 'admin@marksmengroup.com',
            ],

            [
                'name' => 'Marksmen Admin',

                'mobile' => '9999999999',

                'role' => 'admin',

                'password' => Hash::make('Admin@123'),
            ]

        );
    }
}