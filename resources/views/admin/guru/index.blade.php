@extends('admin.layout')

@section('title', 'Guru & Staf')
@section('subtitle', 'Kelola data guru dan tenaga kependidikan')

@section('content')

    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Daftar Guru & Staf <span class="badge-soft badge-blue">{{ $guru->total() }}</span></h2>
            <button class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Guru
            </button>
        </div>

        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr><th>Foto</th><th>Nama</th><th>Jabatan</th><th class="text-end">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($guru as $item)
                        <tr>
                            <td><img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://placehold.co/100x100/38BDF8/FFFFFF?text='.substr($item->nama,0,1) }}" class="table-thumb" style="border-radius:50%;" alt=""></td>
                            <td class="fw-semibold">{{ $item->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <button type="button" class="btn-icon-action" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="bi bi-pencil"></i></button>
                                    <form action="{{ route('admin.guru.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus data guru ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-icon-action text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade admin-modal" id="modalEdit{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('admin.guru.update', $item) }}" method="POST" enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Data Guru</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">@include('admin.guru._form', ['item' => $item])</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr><td colspan="4"><div class="empty-state"><i class="bi bi-person-badge"></i>Belum ada data guru.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">{{ $guru->links() }}</div>
    </div>

    <div class="modal fade admin-modal" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Guru</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">@include('admin.guru._form')</div>
                    <div class="modal-footer">
                        <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
