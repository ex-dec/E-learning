<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPass extends Model
{
    use HasFactory;
    protected $table = 'student_passes';

    protected $fillable = [
        'user_id',
        'grade_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }
}
