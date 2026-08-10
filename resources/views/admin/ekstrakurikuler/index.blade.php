@extends('admin.layout')

@section('title', 'Ekstrakurikuler')
@section('subtitle', 'Kelola daftar kegiatan ekstrakurikuler')

@section('content')

    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Daftar Ekstrakurikuler <span class="badge-soft badge-blue">{{ $ekstrakurikuler->total() }}</span></h2>
            <button class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Ekstrakurikuler
            </button>
        </div>

        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr><th>Gambar</th><th>Nama</th><th>Pembina</th><th>Jadwal</th><th class="text-end">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($ekstrakurikuler as $item)
                        <tr>
                            <td><img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/100x100/38BDF8/FFFFFF?text=E' }}" class="table-thumb" alt=""></td>
                            <td>
                                <div class="fw-semibold">{{ $item->nama }}</div>
                                @if ($item->kategori)<span class="badge-soft badge-gray">{{ $item->kategori }}</span>@endif
                            </td>
                            <td>{{ $item->pembina }}</td>
                            <td>{{ $item->jadwal }}</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <button type="button" class="btn-icon-action" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="bi bi-pencil"></i></button>
                                    <form action="{{ route('admin.ekstrakurikuler.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus ekstrakurikuler ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-icon-action text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade admin-modal" id="modalEdit{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('admin.ekstrakurikuler.update', $item) }}" method="POST" enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Ekstrakurikuler</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">@include('admin.ekstrakurikuler._form', ['item' => $item])</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr><td colspan="5"><div class="empty-state"><i class="bi bi-trophy"></i>Belum ada data ekstrakurikuler.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">{{ $ekstrakurikuler->links() }}</div>
    </div>

    <div class="modal fade admin-modal" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Ekstrakurikuler</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">@include('admin.ekstrakurikuler._form')</div>
                    <div class="modal-footer">
                        <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
