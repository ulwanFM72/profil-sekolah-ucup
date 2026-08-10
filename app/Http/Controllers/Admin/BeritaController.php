<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    use HandlesImageUpload;

    public function index()
    {
        $berita = Berita::orderBy('tanggal', 'desc')->paginate(10);

        return view('admin.berita.index', compact('berita'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => ['required', 'string', 'max:255'],
            'tanggal'   => ['required', 'date'],
            'isi'       => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [], [
            'judul' => 'judul', 'tanggal' => 'tanggal', 'isi' => 'isi', 'thumbnail' => 'thumbnail',
        ]);

        $validated['slug'] = $this->buatSlugUnik($validated['judul']);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->simpanGambar($request->file('thumbnail'), 'berita');
        }

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul'     => ['required', 'string', 'max:255'],
            'tanggal'   => ['required', 'date'],
            'isi'       => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($berita->judul !== $validated['judul']) {
            $validated['slug'] = $this->buatSlugUnik($validated['judul'], $berita->id);
        }

        if ($request->hasFile('thumbnail')) {
            $this->hapusGambar($berita->thumbnail);
            $validated['thumbnail'] = $this->simpanGambar($request->file('thumbnail'), 'berita');
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $this->hapusGambar($berita->thumbnail);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    private function buatSlugUnik(string $judul, ?int $ignoreId = null): string
    {
        $slug = Str::slug($judul);
        $original = $slug;
        $i = 1;

        while (Berita::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $original . '-' . $i++;
        }

        return $slug;
    }
}
