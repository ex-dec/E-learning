<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'nama',
        'jam_jadwal',
        'hari_jadwal',
        'tanggal_jadwal',
        'link',
        'kelas',
    ];
}
