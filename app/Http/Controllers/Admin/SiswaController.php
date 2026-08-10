<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('jurusan')->orderBy('nama')->paginate(10);
        $jurusanList = Jurusan::orderBy('nama')->get();

        return view('admin.siswa.index', compact('siswa', 'jurusanList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'       => ['required', 'string', 'max:255'],
            'kelas'      => ['required', 'string', 'max:50'],
            'jurusan_id' => ['nullable', 'exists:jurusan,id'],
        ]);

        Siswa::create($validated);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama'       => ['required', 'string', 'max:255'],
            'kelas'      => ['required', 'string', 'max:50'],
            'jurusan_id' => ['nullable', 'exists:jurusan,id'],
        ]);

        $siswa->update($validated);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
