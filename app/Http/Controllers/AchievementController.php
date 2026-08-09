<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;

class AchievementController extends Controller
{
    public function index()
    {
        $akademik = Prestasi::where('kategori', 'Akademik')->orderBy('tahun', 'desc')->get();
        $nonAkademik = Prestasi::where('kategori', 'Non Akademik')->orderBy('tahun', 'desc')->get();

        return view('pages.achievement', compact('akademik', 'nonAkademik'));
    }
}
