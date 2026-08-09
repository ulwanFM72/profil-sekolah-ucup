<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $jurusanIds = Jurusan::pluck('id');

        if ($jurusanIds->isEmpty()) {
            // fallback jika seeder Jurusan belum dijalankan
            Siswa::factory()->count(300)->create();
            return;
        }

        // Sebar siswa secara acak namun merata ke tiap jurusan
        foreach ($jurusanIds as $id) {
            Siswa::factory()
                ->count(fake()->numberBetween(65, 90))
                ->create(['jurusan_id' => $id]);
        }
    }
}
