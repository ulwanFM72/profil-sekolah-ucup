<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class NewsController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('tanggal', 'desc')->paginate(9);

        return view('pages.news', compact('berita'));
    }

    public function show(string $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $lainnya = Berita::where('slug', '!=', $slug)->orderBy('tanggal', 'desc')->take(3)->get();

        return view('pages.news-detail', compact('berita', 'lainnya'));
    }
}
