@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px;">
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajahi Kategori - Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .category-btn {
            transition: all 0.3s ease;
        }
        .category-btn:hover {
            transform: translateY(-2px);
        }
        .article-card {
            transition: all 0.3s ease;
        }
        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50">
    <main>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Jelajahi Kategori</h1>

            <!-- Category Filter -->
            <div class="flex flex-wrap gap-3 mb-8">
                <button onclick="filterArticles('semua')" 
                        id="btn-semua"
                        class="category-btn px-4 py-2 rounded-full text-sm font-medium bg-blue-600 text-white">
                    Semua
                </button>
                <button onclick="filterArticles('teknologi')" 
                        id="btn-teknologi"
                        class="category-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700 hover:bg-gray-300">
                    Teknologi
                </button>
                <button onclick="filterArticles('kesehatan')" 
                        id="btn-kesehatan"
                        class="category-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700 hover:bg-gray-300">
                    Kesehatan
                </button>
                <button onclick="filterArticles('bisnis')" 
                        id="btn-bisnis"
                        class="category-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700 hover:bg-gray-300">
                    Bisnis
                </button>
                <button onclick="filterArticles('seni-budaya')" 
                        id="btn-seni-budaya"
                        class="category-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700 hover:bg-gray-300">
                    Seni Budaya
                </button>
                <button onclick="filterArticles('sains')" 
                        id="btn-sains"
                        class="category-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700 hover:bg-gray-300">
                    Sains
                </button>
                <button onclick="filterArticles('travel')" 
                        id="btn-travel"
                        class="category-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700 hover:bg-gray-300">
                    Travel
                </button>
            </div>

            <!-- Articles Grid -->
            <div id="articles-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Article 1 -->
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden" data-category="teknologi">
                    <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">Gambar 1</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                Teknologi
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            Masa Depan AI: Bagaimana Kecerdasan Buatan Mengubah Dunia
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Teknologi kecerdasan buatan telah mengubah cara kita bekerja, berkomunikasi, dan menjalani kehidupan sehari-hari. Dari asisten virtual hingga mobil otonom, AI terus berkembang dengan pesat dan membawa dampak signifikan bagi berbagai industri.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">15 Des 2024</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden" data-category="kesehatan">
                    <div class="w-full h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">Gambar 2</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                Kesehatan
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            Tips Produktivitas untuk Work-Life Balance yang Lebih Baik
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Menjaga keseimbangan antara pekerjaan dan kehidupan pribadi sangat penting untuk kesehatan mental dan fisik. Artikel ini memberikan tips praktis untuk meningkatkan produktivitas sambil tetap menjaga kesehatan dan kebahagiaan.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">12 Des 2024</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden" data-category="bisnis">
                    <div class="w-full h-48 bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">Gambar 3</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                Bisnis
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            Strategi Marketing untuk UMKM di Era Digital
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Era digital memberikan peluang besar bagi UMKM untuk berkembang. Pelajari strategi marketing yang efektif dan terjangkau untuk meningkatkan visibilitas dan penjualan bisnis Anda di platform digital.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">10 Des 2024</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 4 -->
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden" data-category="seni-budaya">
                    <div class="w-full h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">Gambar 4</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-800">
                                Seni Budaya
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            Pelestarian Budaya Indonesia di Era Modern
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Kekayaan budaya Indonesia perlu dilestarikan untuk generasi mendatang. Artikel ini membahas berbagai upaya pelestarian budaya tradisional Indonesia dan tantangan yang dihadapi di era modernisasi.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">8 Des 2024</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 5 -->
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden" data-category="sains">
                    <div class="w-full h-48 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">Gambar 5</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">
                                Sains
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            Penemuan Terbaru dalam Dunia Astronomi
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Dunia astronomi terus berkembang dengan penemuan-penemuan menakjubkan. Dari planet baru hingga fenomena kosmik yang belum pernah terjadi sebelumnya, mari jelajahi keajaiban alam semesta yang tak terbatas.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">5 Des 2024</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 6 -->
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden" data-category="travel">
                    <div class="w-full h-48 bg-gradient-to-br from-cyan-400 to-cyan-600 flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">Gambar 6</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-cyan-100 text-cyan-800">
                                Travel
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            Panduan Wisata Lokal Indonesia yang Wajib Dikunjungi
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Indonesia memiliki ribuan destinasi wisata yang menakjubkan. Dari pantai eksotis hingga pegunungan yang memukau, temukan destinasi wisata lokal yang akan memberikan pengalaman tak terlupakan.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">3 Des 2024</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 7 -->
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden" data-category="teknologi">
                    <div class="w-full h-48 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">Gambar 7</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                Teknologi
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            Blockchain dan Cryptocurrency: Masa Depan Keuangan Digital
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Teknologi blockchain dan cryptocurrency mengubah landscape keuangan global. Pelajari bagaimana inovasi ini dapat memberikan solusi untuk sistem pembayaran yang lebih aman dan efisien.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">1 Des 2024</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 8 -->
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden" data-category="kesehatan">
                    <div class="w-full h-48 bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">Gambar 8</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                Kesehatan
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            Nutrisi dan Gaya Hidup Sehat untuk Generasi Milenial
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Gaya hidup sehat menjadi prioritas utama generasi milenial. Temukan tips nutrisi yang tepat, olahraga yang efektif, dan pola hidup sehat yang dapat diterapkan dalam kehidupan modern yang sibuk.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">28 Nov 2024</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 9 -->
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden" data-category="bisnis">
                    <div class="w-full h-48 bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">Gambar 9</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                Bisnis
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            Investasi Cerdas untuk Pemula: Panduan Lengkap
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Investasi bukan lagi hal yang sulit untuk dipahami. Dengan panduan yang tepat, siapa pun dapat memulai perjalanan investasi yang menguntungkan dan membangun kekayaan jangka panjang.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">25 Nov 2024</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                <nav class="flex items-center space-x-2">
                    <button class="px-3 py-2 text-sm text-gray-500 hover:text-gray-700">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-3 py-2 text-sm bg-blue-600 text-white rounded">1</button>
                    <button class="px-3 py-2 text-sm text-gray-700 hover:text-blue-600">2</button>
                    <button class="px-3 py-2 text-sm text-gray-700 hover:text-blue-600">3</button>
                    <button class="px-3 py-2 text-sm text-gray-500 hover:text-gray-700">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p>&copy; 2024 Artikel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function filterArticles(category) {
            const articles = document.querySelectorAll('.article-card');
            const buttons = document.querySelectorAll('.category-btn');
            
            // Reset all buttons
            buttons.forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
            });
            
            // Highlight active button
            const activeBtn = document.getElementById(`btn-${category}`);
            activeBtn.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
            activeBtn.classList.add('bg-blue-600', 'text-white');
            
            // Filter articles
            articles.forEach(article => {
                if (category === 'semua' || article.getAttribute('data-category') === category) {
                    article.style.display = 'block';
                    // Add fade in animation
                    article.style.opacity = '0';
                    setTimeout(() => {
                        article.style.opacity = '1';
                    }, 100);
                } else {
                    article.style.display = 'none';
                }
            });
        }

        // Add smooth scrolling for better UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>
    </div>
@endsection
