<?php

namespace App\Http\Controllers;

use App\Models\Guru;

class ProfileController extends Controller
{
    public function index()
    {
        $sekolah = [
            'nama' => 'SMK Negeri 1 Cijati',
            'npsn' => '20123456',
            'status' => 'Negeri',
            'akreditasi' => 'A',
            'tahun_berdiri' => '2008',
            'alamat' => 'Jl. Cijati',
            'email' => 'info@smk1cijati.sch.id',
            'website' => 'https://reg-smkn1ciati.sch.id',
            'telepon' => '(022) 123-4567',
            'maps_lat' => '-7.2602795',
            'maps_lng' => '107.0309619',
        ];

        $kepalaSekolah = Guru::where('jabatan', 'Kepala Sekolah')->first();
        $strukturOrganisasi = Guru::orderBy('jabatan')->get();

        return view('pages.profile', compact('sekolah', 'kepalaSekolah', 'strukturOrganisasi'));
    }
}
