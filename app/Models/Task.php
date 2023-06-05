<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'task_url',
        'dateline',
        'grade_id',
        'content',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function taskScore()
    {
        return $this->hasMany(TaskScore::class, 'id', 'task_id');
    }
}
