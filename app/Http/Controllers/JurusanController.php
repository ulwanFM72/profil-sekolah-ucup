<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::withCount('siswa')->orderBy('nama')->get();

        return view('pages.jurusan', compact('jurusan'));
    }

    public function show(string $slug)
    {
        $item = Jurusan::withCount('siswa')
            ->with('galeri')
            ->where('slug', $slug)
            ->firstOrFail();

        $lainnya = Jurusan::where('slug', '!=', $slug)->get();

        return view('pages.jurusan-detail', compact('item', 'lainnya'));
    }
}
