@php $isEdit = isset($item); @endphp

<div class="mb-3">
    <label class="form-label">Nama Lengkap</label>
    <input type="text" name="nama" class="form-control" required maxlength="255"
           value="{{ $isEdit ? $item->nama : old('nama') }}" placeholder="Contoh: Drs. Ahmad Fauzi, M.Pd.">
</div>

<div class="mb-3">
    <label class="form-label">Jabatan</label>
    <input type="text" name="jabatan" class="form-control" required maxlength="255"
           value="{{ $isEdit ? $item->jabatan : old('jabatan') }}" placeholder="Contoh: Guru Matematika / Kepala Sekolah">
</div>

<div class="mb-1">
    <label class="form-label">Foto</label>
    @if ($isEdit && $item->foto)
        <img src="{{ asset('storage/'.$item->foto) }}" class="upload-preview d-block" alt="">
    @endif
    <input type="file" name="foto" accept="image/*" class="form-control">
    <div class="form-text">Format JPG/PNG/WEBP, maks 2MB. {{ $isEdit ? 'Kosongkan jika tidak ingin mengubah foto.' : '' }}</div>
</div>
