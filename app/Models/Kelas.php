<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id', 'kelas_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id', 'kelas_id');
    }
}
