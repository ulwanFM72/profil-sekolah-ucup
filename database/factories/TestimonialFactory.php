<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'jurusan_kelas' => $this->faker->randomElement(['XII IPA 1', 'XII IPS 2', 'Alumni 2023', 'Alumni 2022']),
            'foto' => 'testimonial/default.jpg',
            'isi_testimoni' => $this->faker->paragraph(2),
        ];
    }
}
