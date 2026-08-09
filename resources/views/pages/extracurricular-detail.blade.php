@extends('layouts.app')

@section('title', $item->nama)

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <span class="section-tag">{{ $item->kategori ?? 'Ekstrakurikuler' }}</span>
            <h1 class="page-title">{{ $item->nama }}</h1>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/900x500/38BDF8/FFFFFF?text='.urlencode($item->nama) }}" alt="{{ $item->nama }}" class="detail-image mb-4">

                    <div class="glass-card content-card mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <span class="info-label"><i class="bi bi-person-badge"></i> Pembina</span>
                                <p class="info-value">{{ $item->pembina }}</p>
                            </div>
                            <div class="col-md-6">
                                <span class="info-label"><i class="bi bi-calendar-week"></i> Jadwal</span>
                                <p class="info-value">{{ $item->jadwal }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card content-card">
                        <h4>Deskripsi</h4>
                        <p>{{ $item->deskripsi }}</p>
                    </div>

                    <a href="{{ route('extracurricular.index') }}" class="btn btn-outline-primary-soft rounded-pill mt-4">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Ekstrakurikuler
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
