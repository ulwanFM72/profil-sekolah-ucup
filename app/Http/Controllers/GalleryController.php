<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GalleryController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('created_at', 'desc')->get();

        $kategori = [
            'Semua', 'Pembelajaran', 'Upacara', 'Perlombaan', 'Ekstrakurikuler', 'Wisuda', 'Kegiatan Sosial',
        ];

        return view('pages.gallery', compact('galeri', 'kategori'));
    }
}
