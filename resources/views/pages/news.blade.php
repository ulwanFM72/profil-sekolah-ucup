@extends('layouts.app')

@section('title', 'Berita')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="page-title">Berita & Pengumuman</h1>
            <p class="page-subtitle">Ikuti kabar dan agenda terbaru dari sekolah kami</p>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="row g-4">
                @forelse($berita as $i => $item)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                        <div class="news-card">
                            <div class="news-thumb-wrap">
                                <img src="{{ $item->thumbnail ? asset('storage/'.$item->thumbnail) : 'https://placehold.co/500x300/38BDF8/FFFFFF?text=Berita' }}" alt="{{ $item->judul }}" class="news-thumb">
                                <span class="news-date-badge">{{ $item->tanggal->translatedFormat('d M Y') }}</span>
                            </div>
                            <div class="news-body">
                                <h5 class="news-title">{{ $item->judul }}</h5>
                                <p class="news-excerpt">{{ $item->ringkasan }}</p>
                                <a href="{{ route('news.show', $item->slug) }}" class="news-link">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada berita.</p>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $berita->links() }}
            </div>
        </div>
    </section>

@endsection
