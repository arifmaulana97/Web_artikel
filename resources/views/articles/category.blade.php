@extends('layouts.public')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-6 mt-4">Artikel Kategori: <span
                class="text-blue-600">{{ $category->name }}</span></h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($articles as $article)
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:scale-105 duration-300">
                    @if ($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                            class="w-full h-52 object-cover">
                    @else
                        <div class="w-full h-52 bg-gray-200 flex items-center justify-center text-gray-500 text-center">
                            Tidak ada gambar <br> (Artikel: {{ $article->title }})
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">
                            <span class="bg-purple-100 text-purple-800 px-2.5 py-0.5 rounded-full font-medium mr-2">
                                {{ $article->category->name }}
                            </span>
                            <span><i class="far fa-calendar-alt mr-1"></i>
                                {{ $article->published_at ? $article->published_at->format('d M Y') : 'Draft' }}
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2 leading-tight">
                            <a href="{{ route('articles.show', $article->slug) }}" class="hover:text-blue-600">
                                {{ $article->title }}
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                            {{ Str::limit(strip_tags($article->content), 150) }}
                        </p>
                        <a href="{{ route('articles.show', $article->slug) }}"
                            class="text-blue-600 hover:underline font-medium text-sm flex items-center">
                            Baca Selengkapnya
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>

                        {{-- Tombol Edit/Hapus (hanya untuk penulis artikel atau admin) --}}
                        @auth
                            @if (Auth::user()->id === $article->user_id)
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('articles.edit', $article->slug) }}"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm">Edit</a>
                                    <form action="{{ route('articles.destroy', $article->slug) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">Hapus</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            @empty
                <p class="text-gray-600 col-span-full text-center">Belum ada artikel dalam kategori ini.</p>
            @endforelse
        </div>

        {{-- Navigasi Paginate (jika Anda menerapkan paginasi di controller) --}}
        <div class="mt-8 flex justify-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
