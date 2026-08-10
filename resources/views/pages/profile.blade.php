@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="page-title">Profil Sekolah</h1>
            <p class="page-subtitle">Mengenal lebih dekat sejarah, visi misi, dan identitas sekolah kami</p>
        </div>
    </section>

    {{-- SEJARAH / VISI / MISI --}}
    <section class="section-generic">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-clock-history content-icon"></i>
                        <h4>Sejarah Sekolah</h4>
                        <p>SMA Negeri Harapan Bangsa didirikan pada tahun 1985 sebagai wujud komitmen pemerintah
                            dalam menyediakan pendidikan menengah atas yang berkualitas. Sejak awal berdiri, sekolah
                            terus berkembang baik dari segi fasilitas, kurikulum, maupun prestasi siswa hingga
                            menjadi salah satu sekolah unggulan di daerah ini.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-flag-fill content-icon"></i>
                        <h4>Sambutan Kepala Sekolah</h4>
                        <p>"Selamat datang di SMA Negeri Harapan Bangsa. Kami berkomitmen untuk membentuk generasi
                            yang tidak hanya unggul secara akademik, tetapi juga memiliki karakter yang kuat dan
                            siap menghadapi tantangan masa depan." — {{ $kepalaSekolah->nama ?? 'Kepala Sekolah' }}</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-eye-fill content-icon"></i>
                        <h4>Visi</h4>
                        <p>Terwujudnya peserta didik yang cerdas, berkarakter, dan berdaya saing global berlandaskan
                            iman dan taqwa.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-bullseye content-icon"></i>
                        <h4>Misi</h4>
                        <ul class="mission-list">
                            <li>Menyelenggarakan pembelajaran yang inovatif dan berkualitas.</li>
                            <li>Membentuk karakter siswa yang berakhlak mulia.</li>
                            <li>Mengembangkan potensi siswa melalui kegiatan ekstrakurikuler.</li>
                            <li>Meningkatkan daya saing siswa di tingkat global.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- INFORMASI SEKOLAH --}}
    <section class="section-generic bg-soft">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title">Informasi Sekolah</h2>
            </div>

            <div class="row g-4 mt-2">
                @php
                    $infoItems = [
                        ['icon' => 'bi-mortarboard', 'label' => 'Nama Sekolah', 'value' => $sekolah['nama']],
                        ['icon' => 'bi-upc-scan', 'label' => 'NPSN', 'value' => $sekolah['npsn']],
                        ['icon' => 'bi-patch-check', 'label' => 'Status', 'value' => $sekolah['status']],
                        ['icon' => 'bi-award', 'label' => 'Akreditasi', 'value' => $sekolah['akreditasi']],
                        ['icon' => 'bi-calendar-event', 'label' => 'Tahun Berdiri', 'value' => $sekolah['tahun_berdiri']],
                        ['icon' => 'bi-geo-alt', 'label' => 'Alamat', 'value' => $sekolah['alamat']],
                        ['icon' => 'bi-envelope', 'label' => 'Email', 'value' => $sekolah['email']],
                        ['icon' => 'bi-globe', 'label' => 'Website', 'value' => $sekolah['website']],
                        ['icon' => 'bi-telephone', 'label' => 'Telepon', 'value' => $sekolah['telepon']],
                    ];
                @endphp

                @foreach($infoItems as $i => $info)
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $i * 50 }}">
                        <div class="info-card">
                            <div class="info-icon"><i class="bi {{ $info['icon'] }}"></i></div>
                            <div>
                                <span class="info-label">{{ $info['label'] }}</span>
                                <p class="info-value">{{ $info['value'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- STRUKTUR ORGANISASI --}}
    <section class="section-generic">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title">Struktur Organisasi</h2>
            </div>

            <div class="row g-4 mt-2">
                @foreach($strukturOrganisasi->take(8) as $i => $guru)
                    <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                        <div class="team-card">
                            <img src="{{ $guru->foto ? asset('storage/'.$guru->foto) : 'https://placehold.co/200x200/38BDF8/FFFFFF?text='.substr($guru->nama,0,1) }}" alt="{{ $guru->nama }}">
                            <h6>{{ $guru->nama }}</h6>
                            <span>{{ $guru->jabatan }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- DENAH LOKASI --}}
    <section class="section-generic bg-soft">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title">Denah Lokasi Sekolah</h2>
            </div>
            <div class="map-wrapper" data-aos="zoom-in">
                <iframe src="https://maps.google.com/maps?q={{ $sekolah['maps_lat'] }},{{ $sekolah['maps_lng'] }}&z=17&output=embed"
                    width="100%" height="420" style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
    </section>

@endsection
