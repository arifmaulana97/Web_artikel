<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article; // Import model Article
use App\Models\User;    // Import model User
use App\Models\Category; // Import model Category
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada setidaknya satu user dan satu kategori
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        $category = Category::first();
        if (!$category) {
            // Jika belum ada kategori, buat satu
            $category = Category::create([
                'name' => 'Umum',
                'slug' => 'umum'
            ]);
        }

        Article::factory()->count(10)->create([
            'user_id' => $user->id,
            'category_id' => Category::inRandomOrder()->first()->id ?? $category->id,
            'published_at' => now(), // Atau null jika ingin draft
        ]);

        // Anda juga bisa membuat artikel spesifik:
        Article::create([
            'user_id' => $user->id,
            'category_id' => Category::where('slug', 'teknologi')->first()->id ?? $category->id,
            'title' => 'Masa Depan AI: Prediksi dan Tantangan',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'thumbnail' => null, // Atau 'images/thumbnails/ai_thumbnail.jpg' jika ada
            'published_at' => now(),
        ]);
    }
}