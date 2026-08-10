<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\JurusanGaleri;
use Illuminate\Http\Request;

class JurusanGaleriController extends Controller
{
    use HandlesImageUpload;

    public function index(Jurusan $jurusan)
    {
        $fotoList = $jurusan->galeri()->orderBy('created_at', 'desc')->get();

        return view('admin.jurusan.galeri', compact('jurusan', 'fotoList'));
    }

    public function store(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'judul'  => ['required', 'string', 'max:255'],
            'gambar' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['gambar'] = $this->simpanGambar($request->file('gambar'), 'jurusan-galeri');
        $jurusan->galeri()->create($validated);

        return redirect()->route('admin.jurusan.galeri.index', $jurusan)->with('success', 'Foto berhasil ditambahkan.');
    }

    public function destroy(Jurusan $jurusan, JurusanGaleri $foto)
    {
        $this->hapusGambar($foto->gambar);
        $foto->delete();

        return redirect()->route('admin.jurusan.galeri.index', $jurusan)->with('success', 'Foto berhasil dihapus.');
    }
}
