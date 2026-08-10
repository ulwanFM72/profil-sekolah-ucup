@php $isEdit = isset($item); @endphp

<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">Nama Jurusan</label>
        <input type="text" name="nama" class="form-control" required maxlength="255"
               value="{{ $isEdit ? $item->nama : old('nama') }}" placeholder="Contoh: Rekayasa Perangkat Lunak">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Singkatan</label>
        <input type="text" name="singkatan" class="form-control" required maxlength="20"
               value="{{ $isEdit ? $item->singkatan : old('singkatan') }}" placeholder="Contoh: RPL">
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Kepala Jurusan (opsional)</label>
    <input type="text" name="kepala_jurusan" class="form-control" maxlength="255"
           value="{{ $isEdit ? $item->kepala_jurusan : old('kepala_jurusan') }}" placeholder="Contoh: Dedi Kurniawan, S.Kom.">
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="4" required placeholder="Deskripsi singkat jurusan...">{{ $isEdit ? $item->deskripsi : old('deskripsi') }}</textarea>
</div>

<div class="mb-1">
    <label class="form-label">Gambar Sampul</label>
    @if ($isEdit && $item->gambar_sampul)
        <img src="{{ asset('storage/'.$item->gambar_sampul) }}" class="upload-preview d-block" alt="">
    @endif
    <input type="file" name="gambar_sampul" accept="image/*" class="form-control">
    <div class="form-text">Format JPG/PNG/WEBP, maks 2MB. {{ $isEdit ? 'Kosongkan jika tidak ingin mengubah gambar.' : '' }}</div>
</div>

@if ($isEdit)
    <div class="mt-2">
        <a href="{{ route('admin.jurusan.galeri.index', $item) }}" class="btn-admin-outline">
            <i class="bi bi-images"></i> Kelola Galeri Foto Jurusan Ini
        </a>
    </div>
@endif
