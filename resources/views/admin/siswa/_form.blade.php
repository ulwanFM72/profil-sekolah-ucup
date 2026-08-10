@php $isEdit = isset($item); @endphp

<div class="mb-3">
    <label class="form-label">Nama Siswa</label>
    <input type="text" name="nama" class="form-control" required maxlength="255"
           value="{{ $isEdit ? $item->nama : old('nama') }}" placeholder="Contoh: Putri Ayu Lestari">
</div>

<div class="row">
    <div class="col-6 mb-3">
        <label class="form-label">Kelas</label>
        <input type="text" name="kelas" class="form-control" required maxlength="50"
               value="{{ $isEdit ? $item->kelas : old('kelas') }}" placeholder="Contoh: XII RPL 1">
    </div>
    <div class="col-6 mb-3">
        <label class="form-label">Jurusan</label>
        <select name="jurusan_id" class="form-select">
            <option value="">Tanpa jurusan</option>
            @foreach ($jurusanList as $jurusan)
                <option value="{{ $jurusan->id }}" {{ ($isEdit ? $item->jurusan_id : old('jurusan_id')) == $jurusan->id ? 'selected' : '' }}>
                    {{ $jurusan->singkatan }} - {{ $jurusan->nama }}
                </option>
            @endforeach
        </select>
    </div>
</div>
