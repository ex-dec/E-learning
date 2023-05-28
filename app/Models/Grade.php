<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $fillable = [
        'name',
    ];

    public function task()
    {
        return $this->hasMany(Task::class, 'id', 'grade_id');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'id', 'grade_id');
    }
}
