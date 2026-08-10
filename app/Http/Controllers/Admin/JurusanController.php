<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JurusanController extends Controller
{
    use HandlesImageUpload;

    public function index()
    {
        $jurusan = Jurusan::withCount('siswa')->orderBy('nama')->paginate(10);

        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'           => ['required', 'string', 'max:255'],
            'singkatan'      => ['required', 'string', 'max:20'],
            'kepala_jurusan' => ['nullable', 'string', 'max:255'],
            'deskripsi'      => ['required', 'string'],
            'gambar_sampul'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['slug'] = $this->buatSlugUnik($validated['nama']);

        if ($request->hasFile('gambar_sampul')) {
            $validated['gambar_sampul'] = $this->simpanGambar($request->file('gambar_sampul'), 'jurusan');
        }

        Jurusan::create($validated);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'nama'           => ['required', 'string', 'max:255'],
            'singkatan'      => ['required', 'string', 'max:20'],
            'kepala_jurusan' => ['nullable', 'string', 'max:255'],
            'deskripsi'      => ['required', 'string'],
            'gambar_sampul'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($jurusan->nama !== $validated['nama']) {
            $validated['slug'] = $this->buatSlugUnik($validated['nama'], $jurusan->id);
        }

        if ($request->hasFile('gambar_sampul')) {
            $this->hapusGambar($jurusan->gambar_sampul);
            $validated['gambar_sampul'] = $this->simpanGambar($request->file('gambar_sampul'), 'jurusan');
        }

        $jurusan->update($validated);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        $this->hapusGambar($jurusan->gambar_sampul);
        // Foto galeri terkait ikut terhapus (relasi cascadeOnDelete di migration),
        // tapi file fisiknya perlu dihapus manual dari storage:
        foreach ($jurusan->galeri as $foto) {
            $this->hapusGambar($foto->gambar);
        }
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }

    private function buatSlugUnik(string $nama, ?int $ignoreId = null): string
    {
        $slug = Str::slug($nama);
        $original = $slug;
        $i = 1;

        while (Jurusan::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $original . '-' . $i++;
        }

        return $slug;
    }
}
