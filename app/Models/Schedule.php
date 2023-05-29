<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'nama',
        'jam_jadwal',
        'hari_jadwal',
        'tanggal_jadwal',
        'link',
        'grade_id',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function presence()
    {
        return $this->hasMany(Presence::class, 'id', 'schedule_id');
    }
}
