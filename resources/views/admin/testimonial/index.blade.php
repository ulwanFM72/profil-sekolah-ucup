@extends('admin.layout')

@section('title', 'Testimoni')
@section('subtitle', 'Kelola testimoni siswa/alumni')

@section('content')

    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Daftar Testimoni <span class="badge-soft badge-blue">{{ $testimonial->total() }}</span></h2>
            <button class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Testimoni
            </button>
        </div>

        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr><th>Foto</th><th>Nama</th><th>Jurusan/Kelas</th><th>Testimoni</th><th class="text-end">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($testimonial as $item)
                        <tr>
                            <td><img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://placehold.co/100x100/38BDF8/FFFFFF?text='.substr($item->nama,0,1) }}" class="table-thumb" style="border-radius:50%;" alt=""></td>
                            <td class="fw-semibold">{{ $item->nama }}</td>
                            <td>{{ $item->jurusan_kelas ?? '-' }}</td>
                            <td>{{ Str::limit($item->isi_testimoni, 60) }}</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <button type="button" class="btn-icon-action" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="bi bi-pencil"></i></button>
                                    <form action="{{ route('admin.testimonial.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-icon-action text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade admin-modal" id="modalEdit{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('admin.testimonial.update', $item) }}" method="POST" enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Testimoni</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">@include('admin.testimonial._form', ['item' => $item])</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr><td colspan="5"><div class="empty-state"><i class="bi bi-chat-quote"></i>Belum ada testimoni.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">{{ $testimonial->links() }}</div>
    </div>

    <div class="modal fade admin-modal" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Testimoni</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">@include('admin.testimonial._form')</div>
                    <div class="modal-footer">
                        <button type="button" class="btn-admin-outline" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
