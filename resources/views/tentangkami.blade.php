@extends('layouts.app')
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .page-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 50px;
            color: #212529;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 60px;
        }

        .team-member {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .member-photo {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #e9ecef, #dee2e6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .member-info h3 {
            font-size: 20px;
            margin-bottom: 5px;
            color: #212529;
            font-weight: 600;
        }

        .member-info p {
            color: #6c757d;
            font-size: 14px;
            font-weight: 500;
        }

        .section {
            margin-bottom: 50px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #212529;
        }

        .section-content {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
            font-size: 16px;
            line-height: 1.7;
        }

        .misi-list {
            list-style: none;
            padding-left: 0;
        }

        .misi-list li {
            margin-bottom: 18px;
            padding-left: 25px;
            position: relative;
            font-size: 16px;
        }

        .misi-list li:before {
            content: "•";
            color: #007bff;
            font-weight: bold;
            position: absolute;
            left: 0;
            font-size: 20px;
        }

        .nilai-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .nilai-item {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
            transition: transform 0.3s ease;
        }

        .nilai-item:hover {
            transform: translateY(-3px);
        }

        .nilai-item h4 {
            color: #007bff;
            margin-bottom: 15px;
            font-size: 20px;
            font-weight: 600;
        }

        .nilai-item p {
            color: #495057;
            font-size: 15px;
            line-height: 1.6;
        }

        .join-content {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
        }

        .join-intro {
            font-size: 16px;
            margin-bottom: 30px;
            color: #495057;
            line-height: 1.7;
        }

        .join-steps {
            list-style: none;
            padding-left: 0;
            counter-reset: step-counter;
        }

        .join-steps li {
            margin-bottom: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #007bff;
            position: relative;
            padding-left: 60px;
            font-size: 15px;
            line-height: 1.6;
        }

        .join-steps li:before {
            content: counter(step-counter);
            counter-increment: step-counter;
            background: #007bff;
            color: white;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 50%;
            position: absolute;
            left: 15px;
            top: 20px;
            font-size: 14px;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 32px;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }

            .team-member {
                padding: 20px;
            }

            .section-content {
                padding: 25px;
            }

            .join-steps li {
                padding-left: 50px;
            }
        }
    </style>
@section('content')
    <div class="container" style="padding: 20px;">
    <div class="container">
        <h1 class="page-title">Team</h1>

        <div class="team-grid">
            <div class="team-member">
                <div class="member-photo">foto</div>
                <div class="member-info">
                    <h3>Adit</h3>
                    <p>Backend Developer</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">foto</div>
                <div class="member-info">
                    <h3>Putri</h3>
                    <p>Frontend Developer</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">foto</div>
                <div class="member-info">
                    <h3>Gerland</h3>
                    <p>UI/UX Designer</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">foto</div>
                <div class="member-info">
                    <h3>Reyhana</h3>
                    <p>Product Manager</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">foto</div>
                <div class="member-info">
                    <h3>Edin</h3>
                    <p>DevOps Engineer</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">foto</div>
                <div class="member-info">
                    <h3>Arif Maulana</h3>
                    <p>Full Stack Developer</p>
                </div>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Visi Kami</h2>
            <div class="section-content">
                <p>Menjadi platform teknologi terdepan yang menghubungkan dan memberdayakan komunitas global melalui solusi inovatif dan berkelanjutan. Kami berkomitmen untuk menciptakan ekosistem digital yang dapat diakses oleh semua orang, memungkinkan pertukaran ide, pengetahuan, dan kolaborasi yang bermakna. Visi kami adalah membangun masa depan yang lebih terhubung, produktif, dan inklusif melalui teknologi yang ramah pengguna dan berdampak positif pada masyarakat.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Misi Kami</h2>
            <div class="section-content">
                <p>Kami mewujudkan visi melalui komitmen untuk:</p>
                <ul class="misi-list">
                    <li>Mengembangkan platform teknologi yang dapat diakses oleh semua orang untuk meningkatkan kualitas hidup dan produktivitas masyarakat.</li>
                    <li>Membangun ekosistem digital yang mendukung pertumbuhan bisnis dan kreativitas individu melalui solusi yang user-friendly dan efisien.</li>
                    <li>Menyediakan layanan pelanggan yang responsif dan personal untuk memastikan kepuasan pengguna dalam setiap interaksi dengan platform kami.</li>
                    <li>Mendorong inovasi berkelanjutan melalui riset dan pengembangan teknologi terdepan yang ramah lingkungan dan berkelanjutan.</li>
                    <li>Membangun komunitas yang kuat dengan mengedepankan nilai-nilai kolaborasi, transparansi, dan saling mendukung dalam setiap aspek pekerjaan.</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Nilai-Nilai Inti</h2>
            <div class="nilai-grid">
                <div class="nilai-item">
                    <h4>Inovasi</h4>
                    <p>Selalu mencari pengembangan dan terobosan teknologi baru untuk memberikan solusi terbaik bagi pengguna. Kami mendorong kreativitas dan pemikiran out-of-the-box dalam setiap proyek.</p>
                </div>
                <div class="nilai-item">
                    <h4>Integritas</h4>
                    <p>Berkomitmen pada kejujuran, transparansi, dan etika dalam setiap aspek pekerjaan. Kami membangun kepercayaan melalui konsistensi dan akuntabilitas dalam setiap tindakan.</p>
                </div>
                <div class="nilai-item">
                    <h4>Kolaborasi</h4>
                    <p>Bekerja sama dengan tim internal dan eksternal untuk mencapai tujuan bersama. Kami percaya bahwa kekuatan tim lebih besar dari jumlah individu-individu di dalamnya.</p>
                </div>
                <div class="nilai-item">
                    <h4>Kualitas</h4>
                    <p>Mengutamakan standar tinggi dalam setiap produk dan layanan yang kami berikan. Kami tidak berkompromi dengan kualitas dan selalu berusaha memberikan yang terbaik.</p>
                </div>
                <div class="nilai-item">
                    <h4>Adaptabilitas</h4>
                    <p>Mampu beradaptasi dengan perubahan teknologi dan kebutuhan pasar yang dinamis. Kami fleksibel dalam menghadapi tantangan dan cepat dalam merespons perubahan.</p>
                </div>
                <div class="nilai-item">
                    <h4>Empati</h4>
                    <p>Memahami dan merespon kebutuhan pengguna dengan penuh perhatian. Kami menempatkan user experience sebagai prioritas utama dalam setiap pengambilan keputusan.</p>
                </div>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Bergabunglah dengan Kami</h2>
            <div class="join-content">
                <p class="join-intro">Ingin bergabung dengan tim yang dinamis dan inovatif? Kami selalu mencari talenta terbaik untuk bergabung dalam perjalanan mengembangkan teknologi yang berdampak positif. Berikut adalah langkah-langkah untuk menjadi bagian dari keluarga besar kami:</p>
                <ul class="join-steps">
                    <li>Kirimkan CV dan portofolio terbaru Anda melalui email ke careers@artikel.com dengan subject line yang mencantumkan posisi yang diminati.</li>
                    <li>Tim HR akan meninjau aplikasi Anda dan menghubungi kandidat yang sesuai dengan kualifikasi dalam waktu 1-2 minggu setelah aplikasi diterima.</li>
                    <li>Proses seleksi meliputi tes teknis sesuai posisi, wawancara dengan tim terkait, dan assessment budaya perusahaan untuk memastikan kesesuaian values.</li>
                    <li>Kandidat yang lolos semua tahap akan mendapatkan penawaran kerja dan mengikuti orientasi komprehensif untuk memulai perjalanan bersama tim kami.</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Smooth scrolling untuk anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Animasi hover untuk team members
        const teamMembers = document.querySelectorAll('.team-member');
        teamMembers.forEach(member => {
            member.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            member.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
    </div>
@endsection
