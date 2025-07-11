<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Rute Publik (Tanpa Login)

// Halaman Beranda
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Daftar Semua Artikel
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Artikel berdasarkan Kategori (slug kategori)
Route::get('/articles/category/{categorySlug}', [ArticleController::class, 'category'])->name('articles.category');

// Halaman Tentang Kami
Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');

// Terms of Service
Route::get('/terms-of-service', function () {
    return view('pages.terms');
})->name('terms.show');

// Privacy Policy
Route::get('/privacy-policy', function () {
    return view('pages.policy');
})->name('policy.show');


Route::middleware(['auth'])->group(function () {
    // Dashboard Pengguna
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute Manajemen Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Formulir Tambah Artikel
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

    // Edit, Update, dan Hapus Artikel
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::patch('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});


Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');


// Rute Autentikasi Laravel Breeze
require __DIR__.'/auth.php';