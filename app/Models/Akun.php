<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Pastikan untuk import trait ini

class Akun extends Authenticatable // Ubah dari Model menjadi Authenticatable
{
    protected $table = 'akun';
    protected $fillable = [
        'username',
        'email',
        'password',
        // Tambahkan kolom lain yang ingin di-mass assign jika ada
    ];

    // Pastikan ada metode yang sesuai untuk autentikasi
}
