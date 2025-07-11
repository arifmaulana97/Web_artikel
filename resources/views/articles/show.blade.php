@extends('layouts.public')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('articles.index') }}" class="text-blue-500 hover:underline mb-6 inline-block">&larr; Kembali ke
            Daftar Artikel</a>

        <div class="bg-white rounded-lg shadow-md p-8 mt-4">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $article->title }}</h1>

            <div class="text-gray-600 text-sm mb-6 flex items-center space-x-4">
                <span>
                    Diterbitkan pada: {{ $article->published_at ? $article->published_at->format('d M Y H:i') : 'Draft' }}
                </span>
                <span>
                    Oleh: {{ $article->user->name }}
                </span>
                <span>
                    Kategori: <a href="{{ route('articles.category', $article->category->slug) }}"
                        class="text-blue-500 hover:underline">{{ $article->category->name }}</a>
                </span>
            </div>

            @if ($article->thumbnail)
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                    class="w-full h-80 object-cover rounded-lg mb-6">
            @else
                <div class="w-full h-80 bg-gray-200 flex items-center justify-center text-gray-500 rounded-lg mb-6">
                    Tidak ada gambar
                </div>
            @endif

            <div class="prose max-w-none text-gray-800 leading-relaxed">
                {{-- Gunakan {!! !!} jika Anda yakin konten sudah aman dan mungkin mengandung HTML (misal dari editor WYSIWYG) --}}
                {{-- Jika konten tidak mengandung HTML, cukup gunakan {{ $article->content }} --}}
                {!! nl2br(e($article->content)) !!}
            </div>

            {{-- Tombol Edit/Hapus (hanya untuk penulis artikel atau admin) --}}
            @auth
                @if (Auth::user()->id === $article->user_id)
                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('articles.edit', $article->slug) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit Artikel</a>
                        <form action="{{ route('articles.destroy', $article->slug) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus
                                Artikel</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
@endsection
