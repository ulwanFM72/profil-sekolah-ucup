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
                    <a class="btn btn-primary-gradient rounded-pill px-4" href="{{ route('profile') }}">Info PPDB</a>
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
