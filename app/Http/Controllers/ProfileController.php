<?php

namespace App\Http\Controllers;

use App\Models\Guru;

class ProfileController extends Controller
{
    public function index()
    {
        // Informasi sekolah bisa dipindah ke tabel `sekolah` / config jika diperlukan nanti
        $sekolah = [
            'nama' => 'SMK Negeri 1 Cijati',
            'npsn' => '20123456',
            'status' => 'Negeri',
            'akreditasi' => 'A',
            'tahun_berdiri' => '1985',
            'alamat' => 'SMK Negeri 1 Cijati, Cijati, Kabupaten Cianjur, Jawa Barat',
            'email' => 'info@smkn1cijati.sch.id',
            'website' => 'www.smkn1cijati.sch.id',
            'telepon' => '(022) 123-4567',
            'maps_lat' => '-7.2602795',
            'maps_lng' => '107.0309619',
        ];

        $kepalaSekolah = Guru::where('jabatan', 'Kepala Sekolah')->first();
        $strukturOrganisasi = Guru::orderBy('jabatan')->get();

        return view('pages.profile', compact('sekolah', 'kepalaSekolah', 'strukturOrganisasi'));
    }
}
