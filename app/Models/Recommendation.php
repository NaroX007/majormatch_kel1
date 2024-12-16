<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;
    protected $fillable = [
        'bidang', 'matematika', 'fisika', 'kimia', 'biologi',
        'ekonomi', 'sosiologi', 'geografi', 'minat', 'prestasi', 'prediction',
    ];
}
