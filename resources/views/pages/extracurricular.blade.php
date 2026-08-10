@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="page-title">Ekstrakurikuler</h1>
            <p class="page-subtitle">Beragam kegiatan untuk mengasah potensi siswa di luar akademik</p>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="row g-4">
                @forelse($ekstrakurikuler as $i => $item)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                        <div class="ekskul-card">
                            <div class="ekskul-thumb-wrap">
                                <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/500x350/38BDF8/FFFFFF?text='.urlencode($item->nama) }}" alt="{{ $item->nama }}" class="ekskul-thumb">
                                @if($item->kategori)
                                    <span class="badge-kategori-float">{{ $item->kategori }}</span>
                                @endif
                            </div>
                            <div class="ekskul-body">
                                <h5>{{ $item->nama }}</h5>
                                <ul class="ekskul-meta">
                                    <li><i class="bi bi-person-badge"></i> Pembina: {{ $item->pembina }}</li>
                                    <li><i class="bi bi-calendar-week"></i> {{ $item->jadwal }}</li>
                                </ul>
                                <p class="ekskul-desc">{{ \Illuminate\Support\Str::limit($item->deskripsi, 90) }}</p>
                                <a href="{{ route('extracurricular.show', $item->id) }}" class="btn btn-outline-primary-soft rounded-pill w-100 ripple">
                                    Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada data ekstrakurikuler.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
