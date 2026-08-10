<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul', 'slug', 'thumbnail', 'isi', 'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Ringkasan otomatis untuk card berita di beranda
    public function getRingkasanAttribute(): string
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->isi), 120);
    }
}
