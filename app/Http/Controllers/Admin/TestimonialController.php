<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use HandlesImageUpload;

    public function index()
    {
        $testimonial = Testimonial::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.testimonial.index', compact('testimonial'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => ['required', 'string', 'max:255'],
            'jurusan_kelas' => ['nullable', 'string', 'max:255'],
            'isi_testimoni' => ['required', 'string'],
            'foto'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $this->simpanGambar($request->file('foto'), 'testimonial');
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'nama'          => ['required', 'string', 'max:255'],
            'jurusan_kelas' => ['nullable', 'string', 'max:255'],
            'isi_testimoni' => ['required', 'string'],
            'foto'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $this->hapusGambar($testimonial->foto);
            $validated['foto'] = $this->simpanGambar($request->file('foto'), 'testimonial');
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->hapusGambar($testimonial->foto);
        $testimonial->delete();

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
