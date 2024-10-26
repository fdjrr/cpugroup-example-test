<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['image' => 'storage/categories/default.png', 'name' => 'Aki', 'description' => 'Aki'],
            ['image' => 'storage/categories/default.png', 'name' => 'Ban', 'description' => 'Ban'],
            ['image' => 'storage/categories/default.png', 'name' => 'Spareparts', 'description' => 'Spareparts'],
            ['image' => 'storage/categories/default.png', 'name' => 'Oli', 'description' => 'Oli'],
        ];

        Category::insert($categories);
    }
}
