<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Elektronik', 'Gaming', 'Aksesoris', 'Fashion', 'Makanan'];
        foreach ($categories as $name) {
            \App\Models\Category::create(['name' => $name]);
        }
    }
}
