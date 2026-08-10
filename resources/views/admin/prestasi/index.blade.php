@extends('admin.layout')

@section('title', 'Prestasi')
@section('subtitle', 'Kelola daftar prestasi sekolah')

@section('content')

    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Daftar Prestasi <span class="badge-soft badge-blue">{{ $prestasi->total() }}</span></h2>
            <button class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Prestasi
            </button>
        </div>

        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr><th>Nama Prestasi</th><th>Tingkat</th><th>Kategori</th><th>Tahun</th><th class="text-end">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($prestasi as $item)
                        <tr>
                            <td class="fw-semibold">{{ $item->nama_prestasi }}</td>
                            <td>{{ $item->tingkat }}</td>
                            <td>
                                @if ($item->kategori)
                                    <span class="badge-soft {{ $item->kategori === 'Akademik' ? 'badge-blue' : 'badge-pink' }}">{{ $item->kategori }}</span>
                                @else - @endif
                            </td>
                            <td>{{ $item->tahun }}</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <button type="button" class="btn-icon-action" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="bi bi-pencil"></i></button>
                                    <form action="{{ route('admin.prestasi.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus data prestasi ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-icon-action text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade admin-modal" id="modalEdit{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('admin.prestasi.update', $item) }}" method="POST">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Prestasi</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">@include('admin.prestasi._form', ['item' => $item])</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr><td colspan="5"><div class="empty-state"><i class="bi bi-award"></i>Belum ada data prestasi.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">{{ $prestasi->links() }}</div>
    </div>

    <div class="modal fade admin-modal" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.prestasi.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Prestasi</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">@include('admin.prestasi._form')</div>
                    <div class="modal-footer">
                        <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
