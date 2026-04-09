<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    // Tambakan 'status' di sini biar bisa di-update pas klik download
    protected $fillable = ['nis', 'nama', 'jurusan', 'dudi', 'tanggal', 'status'];
}
