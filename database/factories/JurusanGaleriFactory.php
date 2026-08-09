<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JurusanGaleriFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => $this->faker->randomElement([
                'Praktik di Lab', 'Kegiatan Belajar', 'Praktik Kerja Lapangan', 'Uji Kompetensi Keahlian', 'Kunjungan Industri',
            ]),
            'gambar' => 'jurusan/default.jpg',
        ];
    }
}
