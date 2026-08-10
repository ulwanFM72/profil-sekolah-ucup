@extends('admin.layout')

@section('title', 'Galeri Jurusan ' . $jurusan->singkatan)
@section('subtitle', 'Kelola foto galeri untuk jurusan ' . $jurusan->nama)

@section('content')

    <a href="{{ route('admin.jurusan.index') }}" class="btn-admin-outline mb-3">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Jurusan
    </a>

    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">
                Galeri {{ $jurusan->nama }} <span class="badge-soft badge-blue">{{ $fotoList->count() }}</span>
            </h2>
            <button class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Foto
            </button>
        </div>

        @if ($fotoList->isEmpty())
            <div class="empty-state"><i class="bi bi-images"></i>Belum ada foto galeri untuk jurusan ini.</div>
        @else
            <div class="row g-3">
                @foreach ($fotoList as $foto)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="border rounded-4 overflow-hidden h-100" style="border-color: var(--border-color) !important;">
                            <img src="{{ asset('storage/'.$foto->gambar) }}" alt="{{ $foto->judul }}" style="width:100%;height:130px;object-fit:cover;">
                            <div class="p-2">
                                <div class="fw-semibold" style="font-size:0.82rem;">{{ Str::limit($foto->judul, 30) }}</div>
                                <form action="{{ route('admin.jurusan.galeri.destroy', [$jurusan, $foto]) }}" method="POST" onsubmit="return confirm('Hapus foto ini?');" class="mt-2">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon-action text-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="modal fade admin-modal" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.jurusan.galeri.store', $jurusan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Foto Galeri Jurusan</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judul" class="form-control" required maxlength="255" value="{{ old('judul') }}" placeholder="Contoh: Praktikum Jaringan">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Foto</label>
                            <input type="file" name="gambar" accept="image/*" class="form-control" required>
                            <div class="form-text">Format JPG/PNG/WEBP, maks 2MB.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
