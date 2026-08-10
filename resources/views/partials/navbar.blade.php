<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <span class="brand-logo"><i class="bi bi-mortarboard-fill"></i></span>
            <span class="brand-text">SMK Negeri 1 Cijati</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('jurusan.*') ? 'active' : '' }}" href="{{ route('jurusan.index') }}">Jurusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('extracurricular.*') ? 'active' : '' }}" href="{{ route('extracurricular.index') }}">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('achievement') ? 'active' : '' }}" href="{{ route('achievement') }}">Prestasi</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <button type="button" class="btn btn-primary-gradient rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#ppdbModal">
                        Info PPDB
                    </button>
                </li>
                <li class="nav-item ms-lg-2">
                    <button type="button" class="btn btn-outline-primary-soft rounded-pill px-4 d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right"></i> Login Admin
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="ppdbModal" tabindex="-1" aria-labelledby="ppdbModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ppdbModalLabel">Info PPDB</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Jadwal Pendaftaran</strong><br>Gelombang 1: 1 - 28 Februari</p>
                <p><strong>Syarat Pendaftaran</strong></p>
                <ul>
                    <li>Fotokopi Akta Kelahiran</li>
                    <li>Fotokopi Kartu Keluarga</li>
                    <li>Fotokopi Rapor SMP/MTs (semester 1-5)</li>
                    <li>Pas foto berwarna terbaru 3x4</li>
                </ul>
                <p class="mb-0">Untuk info lebih lanjut, silakan hubungi panitia PPDB di sekolah.</p>
            </div>
        </div>
    </div>
</div>
