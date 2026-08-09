<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'jabatan' => $this->faker->randomElement([
                'Kepala Sekolah', 'Wakil Kepala Sekolah', 'Guru Mata Pelajaran', 'Wali Kelas', 'Staff Tata Usaha',
            ]),
            'foto' => 'guru/default.jpg',
        ];
    }
}
