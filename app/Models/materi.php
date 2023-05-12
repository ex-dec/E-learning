<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    use HasFactory;
    protected $table = "materi";
    public $timestamps = false;
    protected $fillable =[
        'nama',
        'file_url',
        'kelas',
        'content'
    ];
}
