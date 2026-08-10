@extends('admin.layout')

@section('title', 'Jurusan')
@section('subtitle', 'Kelola data jurusan sekolah')

@section('content')

    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Daftar Jurusan <span class="badge-soft badge-blue">{{ $jurusan->total() }}</span></h2>
            <button class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Jurusan
            </button>
        </div>

        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr><th>Sampul</th><th>Jurusan</th><th>Kepala Jurusan</th><th>Jumlah Siswa</th><th class="text-end">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($jurusan as $item)
                        <tr>
                            <td><img src="{{ $item->gambar_sampul ? asset('storage/'.$item->gambar_sampul) : 'https://placehold.co/100x100/38BDF8/FFFFFF?text='.$item->singkatan }}" class="table-thumb-lg" alt=""></td>
                            <td>
                                <div class="fw-semibold">{{ $item->nama }}</div>
                                <span class="badge-soft badge-gray">{{ $item->singkatan }}</span>
                            </td>
                            <td>{{ $item->kepala_jurusan ?? '-' }}</td>
                            <td>{{ $item->siswa_count }} siswa</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.jurusan.galeri.index', $item) }}" class="btn-icon-action" title="Kelola Galeri"><i class="bi bi-images"></i></a>
                                    <button type="button" class="btn-icon-action" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}" title="Edit"><i class="bi bi-pencil"></i></button>
                                    <form action="{{ route('admin.jurusan.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus jurusan ini? Semua foto galerinya juga akan terhapus.');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-icon-action text-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade admin-modal" id="modalEdit{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('admin.jurusan.update', $item) }}" method="POST" enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Jurusan</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">@include('admin.jurusan._form', ['item' => $item])</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr><td colspan="5"><div class="empty-state"><i class="bi bi-diagram-3"></i>Belum ada data jurusan.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">{{ $jurusan->links() }}</div>
    </div>

    <div class="modal fade admin-modal" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Jurusan</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">@include('admin.jurusan._form')</div>
                    <div class="modal-footer">
                        <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
