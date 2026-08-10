@php $isEdit = isset($item); @endphp

<div class="mb-3">
    <label class="form-label">Nama Prestasi</label>
    <input type="text" name="nama_prestasi" class="form-control" required maxlength="255"
           value="{{ $isEdit ? $item->nama_prestasi : old('nama_prestasi') }}" placeholder="Contoh: Juara 1 Olimpiade Matematika">
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Tingkat</label>
        <input type="text" name="tingkat" class="form-control" required maxlength="100"
               value="{{ $isEdit ? $item->tingkat : old('tingkat') }}" placeholder="Kota/Provinsi/Nasional">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select">
            <option value="">Pilih kategori</option>
            <option value="Akademik" {{ ($isEdit ? $item->kategori : old('kategori')) === 'Akademik' ? 'selected' : '' }}>Akademik</option>
            <option value="Non Akademik" {{ ($isEdit ? $item->kategori : old('kategori')) === 'Non Akademik' ? 'selected' : '' }}>Non Akademik</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Tahun</label>
        <input type="number" name="tahun" class="form-control" required min="2000" max="{{ date('Y') + 1 }}"
               value="{{ $isEdit ? $item->tahun : old('tahun', date('Y')) }}">
    </div>
</div>

<div class="mb-1">
    <label class="form-label">Deskripsi (opsional)</label>
    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi singkat prestasi...">{{ $isEdit ? $item->deskripsi : old('deskripsi') }}</textarea>
</div>
