@extends('layouts.app')

@section('content')
    <h2 class="section-title">Artikel Terbaru</h2>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="article-list-container">
            <!-- Artikel 1 -->
            <div class="article-list-item">
                <div class="article-image-placeholder">Gambar 1</div>
                <div class="article-content">
                    <h3 class="article-title">Masa Depan AI: Bagaimana Kecerdasan Buatan Mengubah Dunia</h3>
                    <p class="article-meta">Oleh John Doe | 17 Jul 2024</p>
                    <p class="article-excerpt">
                        Inovasi kecerdasan buatan terus berkembang pesat, mengubah lanskap industri dan kehidupan sehari-hari...
                    </p>
                    <a href="#" class="read-more-btn">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Artikel 2 -->
            <div class="article-list-item">
                <div class="article-image-placeholder">Gambar 2</div>
                <div class="article-content">
                    <h3 class="article-title">Tips Produktivitas untuk Work-Life Balance yang Lebih Baik</h3>
                    <p class="article-meta">Oleh Jane Smith | 15 Jul 2024</p>
                    <p class="article-excerpt">
                        Menjaga keseimbangan antara pekerjaan dan kehidupan pribadi adalah kunci untuk kesejahteraan mental...
                    </p>
                    <a href="#" class="read-more-btn">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Artikel 3 -->
            <div class="article-list-item">
                <div class="article-image-placeholder">Gambar 3</div>
                <div class="article-content">
                    <h3 class="article-title">Manfaat Meditasi Harian: Panduan untuk Pemula</h3>
                    <p class="article-meta">Oleh Peter Jones | 12 Jul 2024</p>
                    <p class="article-excerpt">
                        Meditasi telah terbukti dapat mengurangi stres, meningkatkan fokus, dan memperkuat kesehatan mental...
                    </p>
                    <a href="#" class="read-more-btn">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
