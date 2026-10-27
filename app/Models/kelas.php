<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'jenjang_id',
        'jurusan_id',
        'status',
    ];

    // Relasi ke tabel jenjang
    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(Jenjang::class);
    }

    // Relasi ke tabel jurusan
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }
}
