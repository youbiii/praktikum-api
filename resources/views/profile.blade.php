@extends('layout.app')
@section('content')
    <div class="profile-container">
        <aside class="profile-sidebar">
            <div class="sidebar-header">
                <img src="https://via.placeholder.com/150" alt="Foto Profil Anda" class="profile-picture">
                <h1 class="profile-name">NAMA ANDA</h1>
                <p class="profile-title">Web Developer & UI/UX Enthusiast</p>
            </div>

            <div class="sidebar-content">
                <div class="contact-info">
                    <h3 class="section-title">Kontak</h3>
                    <ul>
                        <li><i class="fas fa-envelope"></i> emailanda@example.com</li>
                        <li><i class="fas fa-phone"></i> +62 812 3456 7890</li>
                        <li><i class="fas fa-map-marker-alt"></i> Bangkinang, Riau</li>
                        <li><i class="fab fa-linkedin"></i> linkedin.com/in/namaanda</li>
                        <li><i class="fab fa-github"></i> github.com/namaanda</li>
                    </ul>
                </div>

                <div class="skills-info">
                    <h3 class="section-title">Keahlian</h3>
                    <ul>
                        <li>HTML & CSS</li>
                        <li>JavaScript (React)</li>
                        <li>PHP (Laravel)</li>
                        <li>UI/UX Design (Figma)</li>
                        <li>Database (MySQL)</li>
                    </ul>
                </div>

                <div class="language-info">
                    <h3 class="section-title">Bahasa</h3>
                    <ul>
                        <li>Indonesia (Native)</li>
                        <li>Inggris (Profesional)</li>
                    </ul>
                </div>
            </div>
        </aside>

        <main class="profile-main">
            <section class="about-section">
                <h2><i class="fas fa-user-alt"></i> Tentang Saya</h2>
                <p>
                    Saya adalah seorang pengembang web yang bersemangat dengan pengalaman dalam menciptakan aplikasi web yang fungsional dan ramah pengguna. Saya memiliki minat besar dalam desain antarmuka dan selalu berusaha untuk belajar teknologi baru untuk meningkatkan keahlian saya. Saat ini berbasis di Bangkinang, Riau.
                </p>
            </section>

            <section class="experience-section">
                <h2><i class="fas fa-briefcase"></i> Pengalaman Kerja</h2>
                <div class="experience-item">
                    <h3>Front-end Developer</h3>
                    <p class="experience-details"><strong>PT Teknologi Maju</strong> | Jakarta | 2023 - Sekarang</p>
                    <ul>
                        <li>Mengembangkan dan memelihara antarmuka pengguna untuk aplikasi web utama perusahaan.</li>
                        <li>Berkolaborasi dengan desainer UI/UX untuk menerjemahkan desain menjadi kode yang responsif.</li>
                        <li>Meningkatkan kecepatan loading halaman hingga 20% melalui optimasi aset.</li>
                    </ul>
                </div>
                <div class="experience-item">
                    <h3>Junior Web Developer</h3>
                    <p class="experience-details"><strong>CV Cipta Karya</strong> | Pekanbaru | 2021 - 2023</p>
                    <ul>
                        <li>Membantu tim senior dalam pengembangan fitur-fitur baru.</li>
                        <li>Melakukan perbaikan bug dan pemeliharaan rutin pada situs web klien.</li>
                    </ul>
                </div>
            </section>

            <section class="education-section">
                <h2><i class="fas fa-graduation-cap"></i> Pendidikan</h2>
                <div class="education-item">
                    <h3>Sarjana Teknik Informatika</h3>
                    <p class="education-details"><strong>Universitas Riau</strong> | 2017 - 2021</p>
                    <p>Fokus pada rekayasa perangkat lunak dan pengembangan aplikasi web dengan IPK 3.80.</p>
                </div>
            </section>
        </main>
    </div>

@endsection
