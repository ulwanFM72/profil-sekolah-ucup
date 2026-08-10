@php $isEdit = isset($item); @endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required maxlength="255"
               value="{{ $isEdit ? $item->nama : old('nama') }}" placeholder="Contoh: Rangga Pratama">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Jurusan / Kelas (opsional)</label>
        <input type="text" name="jurusan_kelas" class="form-control" maxlength="255"
               value="{{ $isEdit ? $item->jurusan_kelas : old('jurusan_kelas') }}" placeholder="Contoh: Alumni RPL 2023">
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Isi Testimoni</label>
    <textarea name="isi_testimoni" class="form-control" rows="4" required placeholder="Tulis testimoni...">{{ $isEdit ? $item->isi_testimoni : old('isi_testimoni') }}</textarea>
</div>

<div class="mb-1">
    <label class="form-label">Foto (opsional)</label>
    @if ($isEdit && $item->foto)
        <img src="{{ asset('storage/'.$item->foto) }}" class="upload-preview d-block" style="border-radius:50%;width:90px;height:90px;" alt="">
    @endif
    <input type="file" name="foto" accept="image/*" class="form-control">
    <div class="form-text">Format JPG/PNG/WEBP, maks 2MB.</div>
</div>
