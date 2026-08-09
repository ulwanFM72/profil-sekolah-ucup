<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriFactory extends Factory
{
    public function definition(): array
    {
        $kategori = $this->faker->randomElement([
            'Pembelajaran', 'Upacara', 'Perlombaan', 'Ekstrakurikuler', 'Wisuda', 'Kegiatan Sosial',
        ]);

        return [
            'judul' => 'Dokumentasi ' . $kategori,
            'kategori' => $kategori,
            'gambar' => 'galeri/default.jpg',
        ];
    }
}
