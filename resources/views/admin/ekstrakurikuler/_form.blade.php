@php $isEdit = isset($item); @endphp

<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">Nama Ekstrakurikuler</label>
        <input type="text" name="nama" class="form-control" required maxlength="255"
               value="{{ $isEdit ? $item->nama : old('nama') }}" placeholder="Contoh: Basket">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control" maxlength="100"
               value="{{ $isEdit ? $item->kategori : old('kategori') }}" placeholder="Contoh: Olahraga">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Pembina</label>
        <input type="text" name="pembina" class="form-control" required maxlength="255"
               value="{{ $isEdit ? $item->pembina : old('pembina') }}" placeholder="Contoh: Budi Santoso, S.Pd.">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Jadwal</label>
        <input type="text" name="jadwal" class="form-control" required maxlength="255"
               value="{{ $isEdit ? $item->jadwal : old('jadwal') }}" placeholder="Contoh: Selasa & Kamis, 15.30 WIB">
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="4" required placeholder="Deskripsi singkat kegiatan...">{{ $isEdit ? $item->deskripsi : old('deskripsi') }}</textarea>
</div>

<div class="mb-1">
    <label class="form-label">Gambar</label>
    @if ($isEdit && $item->gambar)
        <img src="{{ asset('storage/'.$item->gambar) }}" class="upload-preview d-block" alt="">
    @endif
    <input type="file" name="gambar" accept="image/*" class="form-control">
    <div class="form-text">Format JPG/PNG/WEBP, maks 2MB. {{ $isEdit ? 'Kosongkan jika tidak ingin mengubah gambar.' : '' }}</div>
</div>
