<?php

namespace App\Http\Controllers;

class PpdbController extends Controller
{
    public function index()
    {
        $jadwal = [
            ['tahap' => 'Pendaftaran Gelombang 1', 'periode' => '1 - 28 Februari'],
            ['tahap' => 'Seleksi & Verifikasi Berkas', 'periode' => '3 - 7 Maret'],
            ['tahap' => 'Pengumuman Gelombang 1', 'periode' => '10 Maret'],
            ['tahap' => 'Daftar Ulang', 'periode' => '11 - 15 Maret'],
        ];

        $syarat = [
            'Fotokopi Akta Kelahiran',
            'Fotokopi Kartu Keluarga',
            'Fotokopi Rapor SMP/MTs (semester 1-5)',
            'Pas foto berwarna terbaru 3x4',
            'Fotokopi sertifikat/piagam prestasi (jika ada)',
        ];

        $jalur = [
            [
                'icon' => 'bi-geo-alt',
                'nama' => 'Jalur Zonasi',
                'deskripsi' => 'Untuk calon siswa yang berdomisili di sekitar wilayah zonasi sekolah.',
            ],
            [
                'icon' => 'bi-mortarboard',
                'nama' => 'Jalur Prestasi',
                'deskripsi' => 'Untuk calon siswa dengan prestasi akademik maupun non akademik.',
            ],
            [
                'icon' => 'bi-people',
                'nama' => 'Jalur Afirmasi',
                'deskripsi' => 'Untuk calon siswa dari keluarga kurang mampu atau berkebutuhan khusus.',
            ],
        ];

        return view('pages.ppdb', compact('jadwal', 'syarat', 'jalur'));
    }
}
