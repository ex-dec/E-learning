<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = "tugas";
    public $timestamps = false;
    protected $fillable = [
        'tugas_url',
        'deadline',
        'kelas_id',
        'nama',
        'content',

    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
