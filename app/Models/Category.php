<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Tambahkan ini

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug', // Pastikan slug ada di fillable
    ];

    // Mutator untuk otomatis membuat slug dari nama kategori
    protected static function booted()
    {
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function ($category) {
            if ($category->isDirty('name')) { // Hanya update slug jika nama berubah
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Relasi: Satu kategori bisa memiliki banyak artikel
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}