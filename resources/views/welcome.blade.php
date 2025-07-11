@extends('layouts.public')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-3xl font-bold text-center mb-6">Selamat Datang di Artikel Website!</h2>
                    <p class="text-center text-lg text-gray-700">Temukan berbagai artikel menarik seputar teknologi, gaya
                        hidup, dan lainnya.</p>

                    <div class="mt-8 text-center">
                        <a href="{{ route('articles.index') }}"
                            class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                            Lihat Semua Artikel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
