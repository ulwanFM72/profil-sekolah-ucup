<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    use HandlesImageUpload;

    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::orderBy('nama')->paginate(10);

        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'pembina'   => ['required', 'string', 'max:255'],
            'jadwal'    => ['required', 'string', 'max:255'],
            'kategori'  => ['nullable', 'string', 'max:100'],
            'deskripsi' => ['required', 'string'],
            'gambar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $this->simpanGambar($request->file('gambar'), 'ekstrakurikuler');
        }

        Ekstrakurikuler::create($validated);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $validated = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'pembina'   => ['required', 'string', 'max:255'],
            'jadwal'    => ['required', 'string', 'max:255'],
            'kategori'  => ['nullable', 'string', 'max:100'],
            'deskripsi' => ['required', 'string'],
            'gambar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $this->hapusGambar($ekstrakurikuler->gambar);
            $validated['gambar'] = $this->simpanGambar($request->file('gambar'), 'ekstrakurikuler');
        }

        $ekstrakurikuler->update($validated);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $this->hapusGambar($ekstrakurikuler->gambar);
        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
