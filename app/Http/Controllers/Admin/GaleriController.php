<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    use HandlesImageUpload;

    public const KATEGORI = ['Pembelajaran', 'Upacara', 'Perlombaan', 'Ekstrakurikuler', 'Wisuda', 'Kegiatan Sosial'];

    public function index()
    {
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(12);
        $kategoriList = self::KATEGORI;

        return view('admin.galeri.index', compact('galeri', 'kategoriList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'    => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'in:' . implode(',', self::KATEGORI)],
            'gambar'   => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['gambar'] = $this->simpanGambar($request->file('gambar'), 'galeri');

        Galeri::create($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul'    => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'in:' . implode(',', self::KATEGORI)],
            'gambar'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $this->hapusGambar($galeri->gambar);
            $validated['gambar'] = $this->simpanGambar($request->file('gambar'), 'galeri');
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        $this->hapusGambar($galeri->gambar);
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
