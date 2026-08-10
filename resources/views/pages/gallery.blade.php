@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="page-title">Galeri Kegiatan</h1>
            <p class="page-subtitle">Kumpulan momen kegiatan pembelajaran, perlombaan, dan kegiatan sekolah lainnya</p>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            {{-- FILTER KATEGORI --}}
            <div class="gallery-filter d-flex flex-wrap justify-content-center gap-2 mb-5" data-aos="fade-up">
                @foreach($kategori as $i => $kat)
                    <button class="filter-btn {{ $i === 0 ? 'active' : '' }}" data-filter="{{ $kat }}">{{ $kat }}</button>
                @endforeach
            </div>

            {{-- GRID GALERI --}}
            <div class="gallery-grid" data-aos="fade-up">
                @forelse($galeri as $item)
                    <div class="gallery-item" data-category="{{ $item->kategori }}">
                        <a href="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/600x450/38BDF8/FFFFFF?text='.urlencode($item->judul) }}"
                           class="lightbox-trigger"
                           data-caption="{{ $item->judul }} — {{ $item->kategori }}">
                            <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/600x450/38BDF8/FFFFFF?text='.urlencode($item->judul) }}" alt="{{ $item->judul }}" loading="lazy">
                            <div class="gallery-overlay">
                                <span class="gallery-category">{{ $item->kategori }}</span>
                                <span class="gallery-title">{{ $item->judul }}</span>
                                <i class="bi bi-zoom-in overlay-icon"></i>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada foto pada galeri.</p>
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

@endsection
