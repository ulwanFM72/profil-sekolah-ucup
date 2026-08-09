<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BeritaFactory extends Factory
{
    public function definition(): array
    {
        $judul = $this->faker->sentence(6);

        return [
            'judul' => $judul,
            'slug' => Str::slug($judul) . '-' . $this->faker->unique()->randomNumber(4),
            'thumbnail' => 'berita/default.jpg',
            'isi' => $this->faker->paragraphs(4, true),
            'tanggal' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
