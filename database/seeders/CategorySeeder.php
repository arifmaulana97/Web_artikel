<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Import model Category

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Teknologi',
            'Gaya Hidup',
            'Olahraga',
            'Kuliner',
            'Sains',
            'Bisnis',
            'Kesehatan',
            'Hiburan',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                // Slug akan otomatis dibuat oleh model Category
            ]);
        }
    }
}