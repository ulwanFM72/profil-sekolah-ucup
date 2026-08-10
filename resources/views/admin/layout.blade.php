<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Admin SMA Negeri Harapan Bangsa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @stack('styles')
</head>
<body>

    <div class="admin-wrapper">
        {{-- Sidebar --}}
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="sidebar-brand">
                <div class="brand-icon"><i class="bi bi-mortarboard-fill"></i></div>
                <div>
                    <div class="brand-title">Admin Panel</div>
                    <div class="brand-subtitle">SMAN Harapan Bangsa</div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <span class="nav-label">Menu</span>
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2"></i> Dashboard
                </a>

                <span class="nav-label">Konten Website</span>
                <a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i> Galeri
                </a>
                <a href="{{ route('admin.jurusan.index') }}" class="nav-link {{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}">
                    <i class="bi bi-diagram-3"></i> Jurusan
                </a>
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="nav-link {{ request()->routeIs('admin.ekstrakurikuler.*') ? 'active' : '' }}">
                    <i class="bi bi-trophy"></i> Ekstrakurikuler
                </a>
                <a href="{{ route('admin.prestasi.index') }}" class="nav-link {{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}">
                    <i class="bi bi-award"></i> Prestasi
                </a>
                <a href="{{ route('admin.testimonial.index') }}" class="nav-link {{ request()->routeIs('admin.testimonial.*') ? 'active' : '' }}">
                    <i class="bi bi-chat-quote"></i> Testimoni
                </a>

                <span class="nav-label">Data Sekolah</span>
                <a href="{{ route('admin.guru.index') }}" class="nav-link {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge"></i> Guru & Staf
                </a>
                <a href="{{ route('admin.siswa.index') }}" class="nav-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> Siswa
                </a>

            </nav>
        </aside>

        {{-- Overlay untuk mobile --}}
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        {{-- Main content --}}
        <div class="admin-main">
            <header class="admin-topbar">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn-burger" id="burgerBtn" aria-label="Buka menu">
                        <i class="bi bi-list"></i>
                    </button>
                    <div>
                        <h1 class="topbar-title">@yield('title', 'Dashboard')</h1>
                        <p class="topbar-subtitle mb-0">@yield('subtitle', 'Kelola konten website sekolah')</p>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="admin-user-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <span class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        <span class="d-none d-sm-inline">{{ auth()->user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('home') }}" target="_blank"><i class="bi bi-globe me-2"></i>Lihat Website</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </header>

            <main class="admin-content">
                @if (session('success'))
                    <div class="alert admin-alert-success" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert admin-alert-error" role="alert">
                        <i class="bi bi-x-circle-fill me-2"></i>{{ session('error') }}
                    </div>
                @endif
                @if ($errors->any() && !$errors->has('email') && !$errors->has('password'))
                    <div class="alert admin-alert-error" role="alert">
                        <i class="bi bi-x-circle-fill me-2"></i>Periksa kembali data yang Anda masukkan.
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const burgerBtn = document.getElementById('burgerBtn');
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        }
        burgerBtn?.addEventListener('click', toggleSidebar);
        overlay?.addEventListener('click', toggleSidebar);

        // Preview gambar sebelum upload (dipakai di semua form modul)
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            if (!preview || !input.files || !input.files[0]) return;
            const reader = new FileReader();
            reader.onload = e => { preview.src = e.target.result; preview.classList.remove('d-none'); };
            reader.readAsDataURL(input.files[0]);
        }

        // Buka kembali modal tertentu otomatis jika validasi form gagal (kirim dari session)
        @if (session('open_modal'))
            document.addEventListener('DOMContentLoaded', function () {
                const el = document.getElementById('{{ session('open_modal') }}');
                if (el) new bootstrap.Modal(el).show();
            });
        @endif
    </script>

    @stack('scripts')
</body>
</html>
