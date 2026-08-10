@extends('layouts.app')

@section('title', 'Info PPDB')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <span class="section-tag">Penerimaan Peserta Didik Baru</span>
            <h1 class="page-title">Info PPDB</h1>
            <p class="page-subtitle">Informasi lengkap seputar jadwal, syarat, dan jalur pendaftaran siswa baru</p>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Pilihan Jalur</span>
                <h2 class="section-title">Jalur Pendaftaran</h2>
            </div>

            <div class="row g-4 mt-2">
                @foreach($jalur as $i => $item)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                        <div class="glass-card content-card h-100">
                            <i class="bi {{ $item['icon'] }} content-icon"></i>
                            <h4>{{ $item['nama'] }}</h4>
                            <p>{{ $item['deskripsi'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-generic bg-soft">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-calendar-check content-icon"></i>
                        <h4>Jadwal Pendaftaran</h4>
                        <ul class="mission-list">
                            @foreach($jadwal as $item)
                                <li><strong>{{ $item['tahap'] }}</strong> — {{ $item['periode'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-file-earmark-check content-icon"></i>
                        <h4>Syarat Pendaftaran</h4>
                        <ul class="mission-list">
                            @foreach($syarat as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-generic text-center">
        <div class="container" data-aos="fade-up">
            <h2 class="section-title mb-3">Punya Pertanyaan Seputar PPDB?</h2>
            <p class="page-subtitle mb-4">Hubungi panitia PPDB kami untuk informasi lebih lanjut.</p>
            <a href="{{ route('home') }}#kontak" class="btn btn-primary-gradient rounded-pill px-4">Hubungi Kami</a>
        </div>
    </section>

@endsection
