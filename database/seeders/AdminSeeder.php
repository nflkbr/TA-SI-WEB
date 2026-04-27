<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role'     => 'admin',
        ]);
    }
}
