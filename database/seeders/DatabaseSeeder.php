<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder kategori terlebih dahulu
        $this->call(CategorySeeder::class);

        // Panggil UserFactory untuk membuat 10 user dummy
        \App\Models\User::factory(10)->create();

        // Panggil ArticleSeeder (akan membuat admin user jika belum ada)
        $this->call(ArticleSeeder::class);

        // Jika Anda ingin membuat satu user admin secara spesifik
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}