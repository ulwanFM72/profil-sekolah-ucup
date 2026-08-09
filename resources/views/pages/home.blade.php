@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    @include('partials.hero')

    <section class="section-stats">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="0">
                    <div class="stat-card glass-card">
                        <i class="bi bi-person-workspace stat-icon"></i>
                        <h2 class="stat-number" data-count="{{ $statistik['jumlah_guru'] }}">0</h2>
                        <p class="stat-label">Guru & Staff</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-card glass-card">
                        <i class="bi bi-people-fill stat-icon"></i>
                        <h2 class="stat-number" data-count="{{ $statistik['jumlah_siswa'] }}">0</h2>
                        <p class="stat-label">Siswa Aktif</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-card glass-card">
                        <i class="bi bi-trophy-fill stat-icon"></i>
                        <h2 class="stat-number" data-count="{{ $statistik['jumlah_prestasi'] }}">0</h2>
                        <p class="stat-label">Prestasi Diraih</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-card glass-card">
                        <i class="bi bi-stars stat-icon"></i>
                        <h2 class="stat-number" data-count="{{ $statistik['jumlah_ekstrakurikuler'] }}">0</h2>
                        <p class="stat-label">Ekstrakurikuler</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-news">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Informasi Terkini</span>
                <h2 class="section-title">Berita Terbaru</h2>
                <p class="section-subtitle">Ikuti perkembangan dan kegiatan terbaru dari sekolah kami</p>
            </div>

            <div class="row g-4 mt-2">
                @forelse($beritaTerbaru as $i => $berita)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="news-card">
                            <div class="news-thumb-wrap">
                                <img src="{{ $berita->thumbnail ? asset('storage/'.$berita->thumbnail) : 'https://placehold.co/500x300/38BDF8/FFFFFF?text=Berita' }}" alt="{{ $berita->judul }}" class="news-thumb">
                                <span class="news-date-badge">{{ $berita->tanggal->translatedFormat('d M Y') }}</span>
                            </div>
                            <div class="news-body">
                                <h5 class="news-title">{{ $berita->judul }}</h5>
                                <p class="news-excerpt">{{ $berita->ringkasan }}</p>
                                <a href="{{ route('news.show', $berita->slug) }}" class="news-link">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada berita.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-achievement">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Kebanggaan Kami</span>
                <h2 class="section-title">Prestasi Sekolah</h2>
                <p class="section-subtitle">Berbagai capaian akademik maupun non akademik siswa-siswi kami</p>
            </div>

            <div class="achievement-scroll mt-4" data-aos="fade-up">
                @forelse($prestasiTerbaru as $prestasi)
                    <div class="achievement-card">
                        <span class="achievement-year">{{ $prestasi->tahun }}</span>
                        <span class="badge-kategori badge-{{ Str::slug($prestasi->kategori) }}">{{ $prestasi->kategori }}</span>
                        <h6 class="achievement-title">{{ $prestasi->nama_prestasi }}</h6>
                        <p class="achievement-desc">{{ $prestasi->deskripsi }}</p>
                        <span class="achievement-level"><i class="bi bi-award"></i> Tingkat {{ $prestasi->tingkat }}</span>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada data prestasi.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-gallery-preview">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Dokumentasi</span>
                <h2 class="section-title">Galeri Kegiatan</h2>
                <p class="section-subtitle">Momen-momen kegiatan sekolah yang penuh makna</p>
            </div>

            <div class="masonry-grid mt-4" data-aos="fade-up">
                @foreach(\App\Models\Galeri::latest()->take(6)->get() as $item)
                    <div class="masonry-item">
                        <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/400x300/38BDF8/FFFFFF?text=Galeri' }}" alt="{{ $item->judul }}" loading="lazy">
                        <div class="masonry-overlay">
                            <span class="masonry-category">{{ $item->kategori }}</span>
                            <span class="masonry-title">{{ $item->judul }}</span>
                            <i class="bi bi-zoom-in overlay-icon"></i>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4" data-aos="fade-up">
                <a href="{{ route('gallery') }}" class="btn btn-primary-gradient rounded-pill px-4 ripple">
                    Lihat Semua Galeri <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="section-testimonial">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Kata Mereka</span>
                <h2 class="section-title">Testimoni Siswa & Alumni</h2>
            </div>

            <div id="testimonialCarousel" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-inner">
                    @foreach($testimonials->chunk(3) as $index => $chunk)
                        <div class="carousel-item @if($index === 0) active @endif">
                            <div class="row g-4 justify-content-center">
                                @foreach($chunk as $t)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="testimonial-card glass-card">
                                            <i class="bi bi-quote quote-icon"></i>
                                            <p class="testimonial-text">"{{ $t->isi_testimoni }}"</p>
                                            <div class="testimonial-author">
                                                <img src="{{ $t->foto ? asset('storage/'.$t->foto) : 'https://placehold.co/60x60/38BDF8/FFFFFF?text='.substr($t->nama,0,1) }}" alt="{{ $t->nama }}">
                                                <div>
                                                    <h6>{{ $t->nama }}</h6>
                                                    <span>{{ $t->jurusan_kelas }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-nav-btn"><i class="bi bi-chevron-left"></i></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-nav-btn"><i class="bi bi-chevron-right"></i></span>
                </button>
            </div>
        </div>
    </section>

@endsection
