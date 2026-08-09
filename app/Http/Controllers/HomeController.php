<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $statistik = [
            'jumlah_guru' => Guru::count(),
            'jumlah_siswa' => Siswa::count(),
            'jumlah_prestasi' => Prestasi::count(),
            'jumlah_ekstrakurikuler' => Ekstrakurikuler::count(),
        ];

        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')->take(3)->get();
        $prestasiTerbaru = Prestasi::orderBy('tahun', 'desc')->take(6)->get();
        $testimonials = Testimonial::inRandomOrder()->take(6)->get();

        return view('pages.home', compact(
            'statistik',
            'beritaTerbaru',
            'prestasiTerbaru',
            'testimonials'
        ));
    }
}
