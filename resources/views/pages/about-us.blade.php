@extends('layouts.public')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-8">
                <h1 class="text-4xl font-extrabold text-gray-900 text-center mb-6">Tentang Kami</h1>

                <img src="https://via.placeholder.com/800x400?text=Tim+Kami" alt="Tim Kami"
                    class="w-full h-auto rounded-lg mb-8 shadow-md">

                <div class="prose max-w-none text-gray-800 leading-relaxed text-lg">
                    <p class="mb-4">
                        Selamat datang di {{ config('app.name', 'Artikel Website') }}! Kami adalah platform yang berdedikasi
                        untuk menyediakan artikel-artikel berkualitas tinggi dan informatif dari berbagai topik menarik.
                        Misi kami adalah untuk menjadi sumber pengetahuan dan inspirasi bagi pembaca di seluruh dunia.
                    </p>

                    <p class="mb-4">
                        Didirikan pada tahun 2023, kami memulai perjalanan ini dengan visi sederhana: untuk menciptakan
                        ruang di mana ide-ide dapat dibagikan, pertanyaan dapat dijawab, dan rasa ingin tahu dapat
                        dipuaskan. Kami percaya bahwa setiap orang berhak mendapatkan akses ke informasi yang akurat dan
                        mudah dipahami, disajikan dengan cara yang menarik dan menyenangkan.
                    </p>

                    <h2>Visi Kami</h2>
                    <p class="mb-4">
                        Menjadi platform artikel terkemuka yang memberdayakan individu melalui pengetahuan, mendorong
                        pemikiran kritis, dan menginspirasi tindakan positif.
                    </p>

                    <h2>Misi Kami</h2>
                    <ul class="list-disc list-inside mb-4">
                        <li>Menyajikan konten yang akurat, relevan, dan terpercaya.</li>
                        <li>Mencakup beragam topik untuk memenuhi minat pembaca yang luas.</li>
                        <li>Mempromosikan budaya membaca dan belajar sepanjang hayat.</li>
                        <li>Membangun komunitas pembaca dan penulis yang aktif dan positif.</li>
                    </ul>

                    <h2>Tim Kami</h2>
                    <p class="mb-4">
                        Di balik setiap artikel yang Anda baca, ada tim penulis, editor, dan pengembang yang berdedikasi.
                        Kami adalah individu-individu yang bersemangat dengan latar belakang beragam, bersatu oleh satu
                        tujuan: untuk memberikan pengalaman membaca terbaik bagi Anda. Kami terus berupaya untuk
                        meningkatkan kualitas konten dan fungsionalitas platform kami.
                    </p>

                    <div class="text-center mt-8">
                        <p class="font-semibold text-xl mb-4">Bergabunglah dengan Komunitas Kami!</p>
                        <a href="{{ route('register') }}"
                            class="inline-block bg-blue-600 text-white hover:bg-blue-700 font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out">
                            Daftar Gratis Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
