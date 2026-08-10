@php $isEdit = isset($item); @endphp

<div class="mb-3">
    <label class="form-label">Judul Berita</label>
    <input type="text" name="judul" class="form-control" required maxlength="255"
           value="{{ $isEdit ? $item->judul : old('judul') }}" placeholder="Contoh: Prestasi Siswa di Olimpiade Sains">
</div>

<div class="mb-3">
    <label class="form-label">Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required
           value="{{ $isEdit ? $item->tanggal->format('Y-m-d') : old('tanggal') }}">
</div>

<div class="mb-3">
    <label class="form-label">Isi Berita</label>
    <textarea name="isi" class="form-control" rows="6" required placeholder="Tulis isi berita...">{{ $isEdit ? $item->isi : old('isi') }}</textarea>
</div>

<div class="mb-1">
    <label class="form-label">Thumbnail</label>
    @if ($isEdit && $item->thumbnail)
        <img src="{{ asset('storage/'.$item->thumbnail) }}" class="upload-preview d-block" alt="">
    @endif
    <input type="file" name="thumbnail" accept="image/*" class="form-control">
    <div class="form-text">Format JPG/PNG/WEBP, maks 2MB. {{ $isEdit ? 'Kosongkan jika tidak ingin mengubah gambar.' : '' }}</div>
</div>
