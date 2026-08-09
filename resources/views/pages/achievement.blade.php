@extends('layouts.app')

@section('title', 'Prestasi Sekolah')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <span class="section-tag">Kebanggaan Kami</span>
            <h1 class="page-title">Prestasi Sekolah</h1>
            <p class="page-subtitle">Rangkaian pencapaian akademik dan non akademik siswa-siswi kami</p>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <h4 class="d-flex align-items-center gap-2 mb-4">
                        <i class="bi bi-mortarboard-fill text-primary-custom"></i> Prestasi Akademik
                    </h4>
                    <div class="timeline">
                        @forelse($akademik as $item)
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content glass-card">
                                    <span class="achievement-year">{{ $item->tahun }}</span>
                                    <h6>{{ $item->nama_prestasi }}</h6>
                                    <p>{{ $item->deskripsi }}</p>
                                    <span class="achievement-level"><i class="bi bi-award"></i> Tingkat {{ $item->tingkat }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Belum ada data prestasi akademik.</p>
                        @endforelse
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <h4 class="d-flex align-items-center gap-2 mb-4">
                        <i class="bi bi-trophy-fill text-primary-custom"></i> Prestasi Non Akademik
                    </h4>
                    <div class="timeline">
                        @forelse($nonAkademik as $item)
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content glass-card">
                                    <span class="achievement-year">{{ $item->tahun }}</span>
                                    <h6>{{ $item->nama_prestasi }}</h6>
                                    <p>{{ $item->deskripsi }}</p>
                                    <span class="achievement-level"><i class="bi bi-award"></i> Tingkat {{ $item->tingkat }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Belum ada data prestasi non akademik.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
