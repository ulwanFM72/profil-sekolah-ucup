@php $isEdit = isset($item); @endphp

<div class="mb-3">
    <label class="form-label">Judul Foto</label>
    <input type="text" name="judul" class="form-control" required maxlength="255"
           value="{{ $isEdit ? $item->judul : old('judul') }}" placeholder="Contoh: Upacara Bendera 17 Agustus">
</div>

<div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="kategori" class="form-select" required>
        <option value="">Pilih kategori</option>
        @foreach ($kategoriList as $kategori)
            <option value="{{ $kategori }}" {{ ($isEdit ? $item->kategori : old('kategori')) === $kategori ? 'selected' : '' }}>
                {{ $kategori }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-1">
    <label class="form-label">Foto</label>
    @if ($isEdit && $item->gambar)
        <img src="{{ asset('storage/'.$item->gambar) }}" class="upload-preview d-block" alt="">
    @endif
    <input type="file" name="gambar" accept="image/*" class="form-control" {{ $isEdit ? '' : 'required' }}>
    <div class="form-text">Format JPG/PNG/WEBP, maks 2MB. {{ $isEdit ? 'Kosongkan jika tidak ingin mengubah foto.' : '' }}</div>
</div>
