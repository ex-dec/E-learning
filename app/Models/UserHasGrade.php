<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasGrade extends Model
{
    use HasFactory;

    protected $table = 'user_has_grade';

    protected $fillable = [
        'user_id',
        'grade_id'
    ];

    public $timestamps = false;

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }
}
