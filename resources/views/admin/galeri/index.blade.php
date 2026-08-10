@extends('admin.layout')

@section('title', 'Galeri')
@section('subtitle', 'Kelola foto kegiatan sekolah')

@section('content')

    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Galeri Foto <span class="badge-soft badge-blue">{{ $galeri->total() }}</span></h2>
            <button class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Foto
            </button>
        </div>

        @if ($galeri->isEmpty())
            <div class="empty-state"><i class="bi bi-images"></i>Belum ada foto galeri.</div>
        @else
            <div class="row g-3">
                @foreach ($galeri as $item)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="border rounded-4 overflow-hidden h-100" style="border-color: var(--border-color) !important;">
                            <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}" style="width:100%;height:130px;object-fit:cover;">
                            <div class="p-2">
                                <div class="fw-semibold" style="font-size:0.82rem;">{{ Str::limit($item->judul, 30) }}</div>
                                <span class="badge-soft badge-gray">{{ $item->kategori }}</span>
                                <div class="d-flex gap-2 mt-2">
                                    <button type="button" class="btn-icon-action" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <form action="{{ route('admin.galeri.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus foto ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-icon-action text-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade admin-modal" id="modalEdit{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ route('admin.galeri.update', $item) }}" method="POST" enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Foto Galeri</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('admin.galeri._form', ['item' => $item])
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="pagination-wrap">{{ $galeri->links() }}</div>
    </div>

    <div class="modal fade admin-modal" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Foto Galeri</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.galeri._form')
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
