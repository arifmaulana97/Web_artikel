<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Pastikan ini di-import

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar semua artikel publik.
     */
    public function index()
    {
        // Mengambil semua artikel yang sudah diterbitkan, diurutkan terbaru
        $articles = Article::whereNotNull('published_at')
                            ->with(['user', 'category']) // Eager load user dan category untuk menghindari N+1 problem
                            ->latest('published_at')
                            ->paginate(10); // Paginate hasil untuk tampilan halaman

        return view('articles.index', compact('articles'));
    }

    /**
     * Menampilkan detail artikel tertentu berdasarkan slug.
     */
    public function show(Article $article)
    {
        // Periksa apakah artikel belum dipublikasi DAN user tidak login ATAU user yang login bukan penulis artikel ini.
        // Ini mencegah akses ke draft artikel oleh non-penulis/non-admin.
        if (is_null($article->published_at) && (!Auth::check() || Auth::user()->id !== $article->user_id)) {
            abort(404); // Mengembalikan error 404 Not Found
        }

        $article->load(['user', 'category']); // Eager load relasi user dan category
        return view('articles.show', compact('article'));
    }

    /**
     * Menampilkan artikel berdasarkan kategori tertentu.
     * Mengambil kategori berdasarkan slug, lalu artikel yang terkait.
     */
    public function category(string $categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        $articles = Article::where('category_id', $category->id)
                            ->whereNotNull('published_at')
                            ->with(['user', 'category'])
                            ->latest('published_at')
                            ->paginate(10);

        // Mengirimkan objek $category ke view, sehingga bisa mengakses $category->name
        return view('articles.category', compact('articles', 'category'));
    }

    // --- Metode CRUD untuk artikel (create, store, edit, update, destroy) ---
    // Ini adalah metode yang diakses melalui middleware 'auth' karena memerlukan otentikasi pengguna.

    /**
     * Menampilkan formulir untuk membuat artikel baru.
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori untuk dropdown di form
        return view('articles.create', compact('categories')); // Nama file view adalah create.blade.php
    }

    /**
     * Menyimpan artikel baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'title' => 'required|string|max:255|unique:articles,title', // Judul harus unik
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id', // category_id harus ada di tabel categories
            'thumbnail' => 'nullable|image|max:2048', // Bisa kosong, harus gambar, max 2MB
            'published_at' => 'nullable|date', // Bisa kosong, harus format tanggal
        ]);

        // Inisialisasi $thumbnailPath untuk menghindari 'Use of unassigned variable'
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            // Simpan thumbnail ke folder 'thumbnails' di disk 'public'
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Membuat record artikel baru di database
        Article::create([
            'user_id' => Auth::id(), // Penulis adalah user yang sedang login
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $thumbnailPath,
            'published_at' => $request->published_at,
        ]);

        // Redirect ke daftar artikel dengan pesan sukses
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dibuat!');
    }

    /**
     * Menampilkan formulir untuk mengedit artikel.
     * Menggunakan Route Model Binding: Laravel otomatis menemukan Article berdasarkan slug.
     */
    public function edit(Article $article)
    {
        // Autorasi: Pastikan hanya penulis artikel atau admin yang bisa mengedit
        if (Auth::user()->id !== $article->user_id) {
            abort(403); // Forbidden
        }
        $categories = Category::all(); // Ambil semua kategori untuk dropdown di form edit
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Memperbarui artikel di database.
     * Menggunakan Route Model Binding: Laravel otomatis menemukan Article berdasarkan slug.
     */
    public function update(Request $request, Article $article)
    {
        // Autorasi: Pastikan hanya penulis artikel atau admin yang bisa memperbarui
        if (Auth::user()->id !== $article->user_id) {
            abort(403);
        }

        // Validasi input dari form
        $request->validate([
            'title' => 'required|string|max:255|unique:articles,title,' . $article->id, // Judul unik, kecuali untuk artikel ini sendiri
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $thumbnailPath = $article->thumbnail; // Ambil path thumbnail yang sudah ada

        if ($request->hasFile('thumbnail')) {
            // Jika ada thumbnail baru diupload
            if ($article->thumbnail) {
                // Hapus thumbnail lama jika ada
                Storage::disk('public')->delete($article->thumbnail);
            }
            // Simpan thumbnail baru
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        } elseif ($request->input('clear_thumbnail')) { // Opsi jika pengguna ingin menghapus thumbnail saja
            if ($article->thumbnail) {
                // Hapus thumbnail lama jika ada
                Storage::disk('public')->delete($article->thumbnail);
            }
            $thumbnailPath = null; // Set thumbnail menjadi null
        }

        // Memperbarui record artikel di database
        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $thumbnailPath,
            'published_at' => $request->published_at,
        ]);

        // Redirect ke daftar artikel dengan pesan sukses
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Menghapus artikel dari database.
     * Menggunakan Route Model Binding: Laravel otomatis menemukan Article berdasarkan slug.
     */
    public function destroy(Article $article)
    {
        // Autorasi: Pastikan hanya penulis artikel atau admin yang bisa menghapus
        if (Auth::user()->id !== $article->user_id) {
            abort(403);
        }

        // Hapus thumbnail fisik dari storage jika ada
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        // Hapus record artikel dari database
        $article->delete();

        // Redirect ke daftar artikel dengan pesan sukses
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}