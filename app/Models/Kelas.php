<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \app\Models\tugas.php;


class Kelas extends Model
{
    use HasFactory;

    public function tugas(){
        return $this->hasMany(tugas::class, )
    }
}