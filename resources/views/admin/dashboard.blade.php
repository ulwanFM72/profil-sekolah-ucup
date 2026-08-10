@extends('admin.layout')

@section('title', 'Dashboard')
@section('subtitle', 'Ringkasan konten website sekolah')

@section('content')

    <div class="row g-3 mb-4">
        @php
            $cards = [
                ['label' => 'Berita', 'value' => $statistik['berita'], 'icon' => 'bi-newspaper', 'color' => '#38BDF8'],
                ['label' => 'Galeri', 'value' => $statistik['galeri'], 'icon' => 'bi-images', 'color' => '#A855F7'],
                ['label' => 'Jurusan', 'value' => $statistik['jurusan'], 'icon' => 'bi-diagram-3', 'color' => '#F59E0B'],
                ['label' => 'Ekstrakurikuler', 'value' => $statistik['ekstrakurikuler'], 'icon' => 'bi-trophy', 'color' => '#10B981'],
                ['label' => 'Prestasi', 'value' => $statistik['prestasi'], 'icon' => 'bi-award', 'color' => '#EC4899'],
                ['label' => 'Testimoni', 'value' => $statistik['testimonial'], 'icon' => 'bi-chat-quote', 'color' => '#6366F1'],
                ['label' => 'Guru & Staf', 'value' => $statistik['guru'], 'icon' => 'bi-person-badge', 'color' => '#0EA5E9'],
                ['label' => 'Siswa', 'value' => $statistik['siswa'], 'icon' => 'bi-people', 'color' => '#14B8A6'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background: {{ $card['color'] }};">
                        <i class="bi {{ $card['icon'] }}"></i>
                    </div>
                    <div>
                        <div class="stat-value">{{ $card['value'] }}</div>
                        <div class="stat-label">{{ $card['label'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title"><i class="bi bi-newspaper me-2"></i>Berita Terbaru</h2>
                    <a href="{{ route('admin.berita.index') }}" class="btn-admin-outline">Kelola <i class="bi bi-arrow-right"></i></a>
                </div>

                @forelse ($beritaTerbaru as $item)
                    <div class="d-flex align-items-center gap-3 py-2 {{ !$loop->last ? 'border-bottom' : '' }}">
                        <img src="{{ $item->thumbnail ? asset('storage/'.$item->thumbnail) : 'https://placehold.co/100x100/38BDF8/FFFFFF?text=B' }}" class="table-thumb" alt="">
                        <div class="flex-grow-1">
                            <div class="fw-semibold" style="font-size:0.88rem;">{{ Str::limit($item->judul, 45) }}</div>
                            <div class="text-muted" style="font-size:0.76rem;">{{ $item->tanggal->translatedFormat('d M Y') }}</div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state py-3">
                        <i class="bi bi-newspaper"></i>
                        <p class="mb-0 small">Belum ada berita.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title"><i class="bi bi-award me-2"></i>Prestasi Terbaru</h2>
                    <a href="{{ route('admin.prestasi.index') }}" class="btn-admin-outline">Kelola <i class="bi bi-arrow-right"></i></a>
                </div>

                @forelse ($prestasiTerbaru as $item)
                    <div class="d-flex align-items-center gap-3 py-2 {{ !$loop->last ? 'border-bottom' : '' }}">
                        <div class="stat-icon" style="width:40px;height:40px;font-size:1rem;background:#FEF3C7;color:#B45309;">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="fw-semibold" style="font-size:0.88rem;">{{ Str::limit($item->nama_prestasi, 45) }}</div>
                            <div class="text-muted" style="font-size:0.76rem;">{{ $item->tingkat }} &middot; {{ $item->tahun }}</div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state py-3">
                        <i class="bi bi-award"></i>
                        <p class="mb-0 small">Belum ada data prestasi.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
