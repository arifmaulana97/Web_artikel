<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Penulis artikel
            $table->foreignId('category_id')->constrained()->onDelete('restrict'); // Kategori artikel
            $table->string('title')->unique(); // Judul artikel
            $table->string('slug')->unique();  // Slug untuk URL artikel
            $table->text('content');         // Isi artikel
            $table->string('thumbnail')->nullable(); // Path gambar thumbnail (opsional)
            $table->timestamp('published_at')->nullable(); // Kapan artikel diterbitkan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};