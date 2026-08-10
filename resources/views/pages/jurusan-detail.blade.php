@extends('layouts.app')

@section('title', $item->nama)

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <span class="section-tag">{{ $item->singkatan }}</span>
            <h1 class="page-title">{{ $item->nama }}</h1>
        </div>
    </section>

    {{-- KETERANGAN JURUSAN + STATISTIK --}}
    <section class="section-generic">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-7" data-aos="fade-right">
                    <img src="{{ $item->gambar_sampul ? asset('storage/'.$item->gambar_sampul) : 'https://placehold.co/900x500/38BDF8/FFFFFF?text='.$item->singkatan }}" alt="{{ $item->nama }}" class="detail-image mb-4">

                    <div class="glass-card content-card">
                        <i class="bi bi-info-circle-fill content-icon"></i>
                        <h4>Tentang Jurusan {{ $item->singkatan }}</h4>
                        <p>{{ $item->deskripsi }}</p>

                        @if($item->kepala_jurusan)
                            <div class="d-flex align-items-center gap-2 mt-3">
                                <i class="bi bi-person-badge text-primary-custom"></i>
                                <span><strong>Kepala Jurusan:</strong> {{ $item->kepala_jurusan }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-5" data-aos="fade-left">
                    <div class="jurusan-stat-card">
                        <i class="bi bi-people-fill"></i>
                        <h2 class="stat-number" data-count="{{ $item->siswa_count }}">0</h2>
                        <p>Siswa Aktif di Jurusan {{ $item->singkatan }}</p>
                    </div>

                    <div class="row g-3 mt-1">
                        <div class="col-6">
                            <div class="info-card">
                                <div class="info-icon"><i class="bi bi-mortarboard"></i></div>
                                <div>
                                    <span class="info-label">Program</span>
                                    <p class="info-value">{{ $item->singkatan }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info-card">
                                <div class="info-icon"><i class="bi bi-images"></i></div>
                                <div>
                                    <span class="info-label">Dokumentasi</span>
                                    <p class="info-value">{{ $item->galeri->count() }} Foto</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('jurusan.index') }}" class="btn btn-outline-primary-soft rounded-pill w-100 mt-4">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Jurusan
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- GALERI JURUSAN --}}
    <section class="section-generic bg-soft">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Dokumentasi</span>
                <h2 class="section-title">Galeri Kegiatan Jurusan {{ $item->singkatan }}</h2>
            </div>

            <div class="gallery-grid mt-4" data-aos="fade-up">
                @forelse($item->galeri as $foto)
                    <div class="gallery-item">
                        <a href="{{ $foto->gambar ? asset('storage/'.$foto->gambar) : 'https://placehold.co/600x450/38BDF8/FFFFFF?text='.urlencode($foto->judul) }}"
                           class="lightbox-trigger"
                           data-caption="{{ $foto->judul }}">
                            <img src="{{ $foto->gambar ? asset('storage/'.$foto->gambar) : 'https://placehold.co/600x450/38BDF8/FFFFFF?text='.urlencode($foto->judul) }}" alt="{{ $foto->judul }}" loading="lazy">
                            <div class="gallery-overlay">
                                <span class="gallery-title">{{ $foto->judul }}</span>
                                <i class="bi bi-zoom-in overlay-icon"></i>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada dokumentasi untuk jurusan ini.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- LIGHTBOX MODAL --}}
    <div class="lightbox-modal" id="lightboxModal">
        <span class="lightbox-close" id="lightboxClose"><i class="bi bi-x-lg"></i></span>
        <img src="" alt="" id="lightboxImage">
        <p id="lightboxCaption"></p>
    </div>

    {{-- JURUSAN LAIN --}}
    <section class="section-generic">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Lainnya</span>
                <h2 class="section-title">Jurusan Lain</h2>
            </div>
            <div class="row g-4 mt-2">
                @foreach($lainnya as $lain)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <a href="{{ route('jurusan.show', $lain->slug) }}" class="jurusan-mini-card">
                            <span class="jurusan-mini-badge">{{ $lain->singkatan }}</span>
                            <h6>{{ $lain->nama }}</h6>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
