<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskScore extends Model
{
    use HasFactory;

    protected $table = 'task_scores';

    protected $fillable = [
        'task_id',
        'user_id',
        'grade_id',
        'score'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }
}
