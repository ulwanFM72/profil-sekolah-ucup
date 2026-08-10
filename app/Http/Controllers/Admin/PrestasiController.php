<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::orderBy('tahun', 'desc')->paginate(10);

        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_prestasi' => ['required', 'string', 'max:255'],
            'tingkat'       => ['required', 'string', 'max:100'],
            'kategori'      => ['nullable', 'string', 'in:Akademik,Non Akademik'],
            'tahun'         => ['required', 'digits:4', 'integer', 'min:2000', 'max:' . (date('Y') + 1)],
            'deskripsi'     => ['nullable', 'string'],
        ]);

        Prestasi::create($validated);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $validated = $request->validate([
            'nama_prestasi' => ['required', 'string', 'max:255'],
            'tingkat'       => ['required', 'string', 'max:100'],
            'kategori'      => ['nullable', 'string', 'in:Akademik,Non Akademik'],
            'tahun'         => ['required', 'digits:4', 'integer', 'min:2000', 'max:' . (date('Y') + 1)],
            'deskripsi'     => ['nullable', 'string'],
        ]);

        $prestasi->update($validated);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}
