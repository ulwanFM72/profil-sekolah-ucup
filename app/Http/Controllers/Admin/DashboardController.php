<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $statistik = [
            'berita'          => Berita::count(),
            'galeri'          => Galeri::count(),
            'guru'            => Guru::count(),
            'siswa'           => Siswa::count(),
            'ekstrakurikuler' => Ekstrakurikuler::count(),
            'prestasi'        => Prestasi::count(),
            'testimonial'     => Testimonial::count(),
            'jurusan'         => Jurusan::count(),
        ];

        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(5)->get();
        $prestasiTerbaru = Prestasi::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('statistik', 'beritaTerbaru', 'prestasiTerbaru'));
    }
}
