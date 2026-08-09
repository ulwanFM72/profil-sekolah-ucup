<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\JurusanGaleri;
use Illuminate\Database\Seeder;

class JurusanGaleriSeeder extends Seeder
{
    public function run(): void
    {
        Jurusan::all()->each(function (Jurusan $jurusan) {
            JurusanGaleri::factory()
                ->count(6)
                ->create(['jurusan_id' => $jurusan->id]);
        });
    }
}
