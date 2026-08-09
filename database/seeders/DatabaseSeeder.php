<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,          // akun login admin
            JurusanSeeder::class,        // harus dijalankan sebelum SiswaSeeder
            BeritaSeeder::class,
            GaleriSeeder::class,
            GuruSeeder::class,
            SiswaSeeder::class,
            JurusanGaleriSeeder::class,
            EkstrakurikulerSeeder::class,
            PrestasiSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
