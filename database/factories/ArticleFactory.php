<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(mt_rand(5, 10)); // Judul 5-10 kata
        $content = $this->faker->paragraphs(mt_rand(10, 20), true); // Konten 10-20 paragraf

        // Pastikan ada user dan kategori sebelum membuat artikel
        $userId = User::inRandomOrder()->first()->id ?? User::factory()->create()->id;
        $categoryId = Category::inRandomOrder()->first()->id ?? Category::factory()->create(['name' => 'Uncategorized', 'slug' => 'uncategorized'])->id;

        return [
            'user_id' => $userId,
            'category_id' => $categoryId,
            'title' => $title,
            'slug' => Str::slug($title . '-' . uniqid()), // Tambahkan uniqid agar slug selalu unik
            'content' => $content,
            'thumbnail' => null, // Biarkan null dulu atau atur path gambar dummy
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Artikel dipublikasikan dalam 1 tahun terakhir
        ];
    }
}