<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');            // contoh: Rekayasa Perangkat Lunak
            $table->string('singkatan');       // contoh: RPL
            $table->string('slug')->unique();
            $table->string('kepala_jurusan')->nullable();
            $table->text('deskripsi');
            $table->string('gambar_sampul')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusan');
    }
};
