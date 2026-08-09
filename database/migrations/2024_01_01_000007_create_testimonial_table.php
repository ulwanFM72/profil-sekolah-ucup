<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonial', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jurusan_kelas')->nullable();
            $table->string('foto')->nullable();
            $table->text('isi_testimoni');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonial');
    }
};
