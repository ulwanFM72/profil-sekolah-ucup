<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanGaleri extends Model
{
    use HasFactory;

    protected $table = 'jurusan_galeri';

    protected $fillable = ['jurusan_id', 'judul', 'gambar'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
