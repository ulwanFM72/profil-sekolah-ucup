<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PrestasiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_prestasi' => 'Juara ' . $this->faker->numberBetween(1, 3) . ' ' . $this->faker->randomElement([
                'Lomba Cerdas Cermat', 'Olimpiade Sains', 'Lomba Futsal Antar Sekolah', 'Lomba Tari Tradisional', 'LCC Nasional',
            ]),
            'tingkat' => $this->faker->randomElement(['Kota', 'Provinsi', 'Nasional']),
            'kategori' => $this->faker->randomElement(['Akademik', 'Non Akademik']),
            'tahun' => $this->faker->numberBetween(2020, 2026),
            'deskripsi' => $this->faker->sentence(12),
        ];
    }
}
