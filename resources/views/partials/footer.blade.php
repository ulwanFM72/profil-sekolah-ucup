<footer class="site-footer">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('images/logo-smkn1cijati.png') }}" alt="Logo Sekolah" class="brand-logo">
                    <span class="footer-brand">SMK Negeri 1 Cijati</span>
                </div>
                <p class="footer-text">Membentuk generasi cerdas, berkarakter, dan siap menghadapi masa depan melalui pendidikan yang berkualitas.</p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="footer-title">Navigasi</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profile') }}">Profil Sekolah</a></li>
                    <li><a href="{{ route('jurusan.index') }}">Jurusan</a></li>
                    <li><a href="{{ route('extracurricular.index') }}">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('gallery') }}">Galeri</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="footer-title">Informasi</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('news.index') }}">Berita</a></li>
                    <li><a href="{{ route('achievement') }}">Prestasi</a></li>
                    <li><a href="#">PPDB Online</a></li>
                    <li><a href="#">Kalender Akademik</a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h6 class="footer-title">Kontak Kami</h6>
                <ul class="footer-contact">
                    <li><i class="bi bi-geo-alt-fill"></i> Jl. Pendidikan No. 10, Bandung, Jawa Barat</li>
                    <li><i class="bi bi-envelope-fill"></i> info@smaharapanbangsa.sch.id</li>
                    <li><i class="bi bi-telephone-fill"></i> (022) 123-4567</li>
                </ul>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center gap-2">
            <p class="mb-0 footer-copy">&copy; {{ date('Y') }} SMK Negeri 1 Cijati. Seluruh hak cipta dilindungi.</p>
            <p class="mb-0 footer-copy">Dibangun dengan <i class="bi bi-heart-fill text-danger"></i> menggunakan Laravel</p>
        </div>
    </div>
</footer>
