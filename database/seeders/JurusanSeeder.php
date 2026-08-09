<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'singkatan' => 'RPL',
                'kepala_jurusan' => 'Budi Santoso, S.Kom.',
                'deskripsi' => 'Kompetensi Keahlian Rekayasa Perangkat Lunak membekali siswa dengan kemampuan '
                    . 'merancang, membangun, dan menguji perangkat lunak berbasis web maupun mobile. Siswa belajar '
                    . 'pemrograman terstruktur dan berorientasi objek, basis data, algoritma, hingga pengembangan '
                    . 'aplikasi siap pakai yang relevan dengan kebutuhan industri digital saat ini.',
            ],
            [
                'nama' => 'Bisnis Daring dan Pemasaran',
                'singkatan' => 'BDP',
                'kepala_jurusan' => 'Siti Aminah, S.E.',
                'deskripsi' => 'Kompetensi Keahlian Bisnis Daring dan Pemasaran mencetak lulusan yang memahami '
                    . 'strategi pemasaran modern, digital marketing, manajemen bisnis online, hingga pengelolaan '
                    . 'toko daring. Siswa dibekali keterampilan komunikasi bisnis dan analisis pasar untuk siap '
                    . 'terjun ke dunia wirausaha maupun industri retail.',
            ],
            [
                'nama' => 'Teknik Otomotif',
                'singkatan' => 'TO',
                'kepala_jurusan' => 'Agus Prasetyo, S.Pd.',
                'deskripsi' => 'Kompetensi Keahlian Teknik Otomotif memberikan keahlian perawatan, perbaikan, dan '
                    . 'diagnosis kerusakan kendaraan bermotor. Melalui praktik langsung di bengkel sekolah dan '
                    . 'kerja sama industri, siswa disiapkan menjadi teknisi otomotif yang kompeten dan siap kerja.',
            ],
            [
                'nama' => 'Agribisnis Pengolahan Hasil Pertanian',
                'singkatan' => 'APHP',
                'kepala_jurusan' => 'Dewi Lestari, S.TP.',
                'deskripsi' => 'Kompetensi Keahlian Agribisnis Pengolahan Hasil Pertanian membekali siswa dalam '
                    . 'mengolah hasil pertanian menjadi produk pangan bernilai jual, mulai dari teknik pengawetan, '
                    . 'pengemasan, uji mutu, hingga manajemen usaha agribisnis skala kecil dan menengah.',
            ],
        ];

        foreach ($data as $item) {
            Jurusan::create([
                'nama' => $item['nama'],
                'singkatan' => $item['singkatan'],
                'slug' => Str::slug($item['singkatan']),
                'kepala_jurusan' => $item['kepala_jurusan'],
                'deskripsi' => $item['deskripsi'],
                'gambar_sampul' => 'jurusan/'.Str::slug($item['singkatan']).'.jpg',
            ]);
        }
    }
}
