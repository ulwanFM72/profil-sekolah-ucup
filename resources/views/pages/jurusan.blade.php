@extends('layouts.app')

@section('title', 'Jurusan')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <span class="section-tag">Kompetensi Keahlian</span>
            <h1 class="page-title">Jurusan / Program Keahlian</h1>
            <p class="page-subtitle">Empat kompetensi keahlian unggulan yang kami sediakan untuk mempersiapkan siswa siap kerja, siap kuliah, dan siap berwirausaha</p>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="row g-4">
                @forelse($jurusan as $i => $item)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ ($i % 2) * 100 }}">
                        <div class="jurusan-card">
                            <div class="jurusan-thumb-wrap">
                                <img src="{{ $item->gambar_sampul ? asset('storage/'.$item->gambar_sampul) : 'https://placehold.co/700x420/38BDF8/FFFFFF?text='.$item->singkatan }}" alt="{{ $item->nama }}" class="jurusan-thumb">
                                <span class="jurusan-badge">{{ $item->singkatan }}</span>
                            </div>
                            <div class="jurusan-body">
                                <h4>{{ $item->nama }}</h4>
                                <p class="jurusan-desc">{{ \Illuminate\Support\Str::limit($item->deskripsi, 140) }}</p>

                                <div class="jurusan-meta">
                                    <div class="jurusan-meta-item">
                                        <i class="bi bi-people-fill"></i>
                                        <div>
                                            <strong>{{ $item->siswa_count }}</strong>
                                            <span>Siswa Aktif</span>
                                        </div>
                                    </div>
                                    <div class="jurusan-meta-item">
                                        <i class="bi bi-images"></i>
                                        <div>
                                            <strong>{{ $item->galeri()->count() }}</strong>
                                            <span>Dokumentasi</span>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('jurusan.show', $item->slug) }}" class="btn btn-primary-gradient rounded-pill w-100 mt-3 ripple">
                                    Lihat Detail Jurusan <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada data jurusan.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
