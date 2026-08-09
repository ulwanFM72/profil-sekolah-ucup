<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EkstrakurikulerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->randomElement([
                'Pramuka', 'Basket', 'Futsal', 'Paskibra', 'PMR', 'Seni Tari', 'Robotik', 'English Club',
            ]),
            'pembina' => $this->faker->name(),
            'jadwal' => $this->faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']) . ', 15:00 - 17:00',
            'deskripsi' => $this->faker->paragraph(3),
            'gambar' => 'ekstrakurikuler/default.jpg',
            'kategori' => $this->faker->randomElement(['Olahraga', 'Seni', 'Akademik', 'Kepemimpinan']),
        ];
    }
}
