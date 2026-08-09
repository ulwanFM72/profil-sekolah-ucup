<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | SMA Negeri Harapan Bangsa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--light-gray); }
        .topbar {
            background: #fff; padding: 16px 28px; display: flex; justify-content: space-between;
            align-items: center; box-shadow: 0 2px 10px rgba(15,23,42,0.06);
        }
        .topbar h1 { font-family: 'Poppins', sans-serif; font-size: 1.15rem; margin: 0; color: var(--dark-blue); }
        .wrap { padding: 40px 28px; text-align: center; }
        .wrap i { font-size: 3rem; color: var(--primary-dark); margin-bottom: 16px; }
    </style>
</head>
<body>
    <div class="topbar">
        <h1><i class="bi bi-speedometer2 me-2"></i>Dashboard Admin</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-sm btn-outline-primary-soft rounded-pill px-3">
                <i class="bi bi-box-arrow-right me-1"></i>Logout
            </button>
        </form>
    </div>

    <div class="wrap">
        <i class="bi bi-check-circle"></i>
        <h2 class="mb-2">Login berhasil, {{ auth()->user()->name }}!</h2>
        <p class="text-muted">Modul CRUD untuk mengelola Berita, Galeri, Guru, Siswa, Ekstrakurikuler, Prestasi, Testimonial, dan Jurusan akan dibangun pada tahap berikutnya.</p>
    </div>
</body>
</html>
