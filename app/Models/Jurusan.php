<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $fillable = [
    'nama_jurusan',
    'kode_jurusan',
    'keterangan',
    'status',
];
}
