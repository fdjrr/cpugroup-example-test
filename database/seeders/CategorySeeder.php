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
            ['name' => 'Aki', 'description' => 'Aki'],
            ['name' => 'Ban', 'description' => 'Ban'],
            ['name' => 'Spareparts', 'description' => 'Spareparts'],
            ['name' => 'Oli', 'description' => 'Oli'],
        ];

        Category::insert($categories);
    }
}
