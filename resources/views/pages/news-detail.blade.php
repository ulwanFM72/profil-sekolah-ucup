@extends('layouts.app')

@section('title', $berita->judul)

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <span class="section-tag">{{ $berita->tanggal->translatedFormat('d F Y') }}</span>
            <h1 class="page-title">{{ $berita->judul }}</h1>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <img src="{{ $berita->thumbnail ? asset('storage/'.$berita->thumbnail) : 'https://placehold.co/900x500/38BDF8/FFFFFF?text=Berita' }}" alt="{{ $berita->judul }}" class="detail-image mb-4">
                    <div class="news-content">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>
                    <a href="{{ route('news.index') }}" class="btn btn-outline-primary-soft rounded-pill mt-4">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Berita
                    </a>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <h5 class="mb-3">Berita Lainnya</h5>
                    @foreach($lainnya as $l)
                        <a href="{{ route('news.show', $l->slug) }}" class="news-side-card">
                            <img src="{{ $l->thumbnail ? asset('storage/'.$l->thumbnail) : 'https://placehold.co/150x100/38BDF8/FFFFFF?text=Berita' }}" alt="{{ $l->judul }}">
                            <div>
                                <h6>{{ \Illuminate\Support\Str::limit($l->judul, 50) }}</h6>
                                <span>{{ $l->tanggal->translatedFormat('d M Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
