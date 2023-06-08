<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'title',
        'time_start',
        'time_end',
        'day_schedule',
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

    public function scheduleLog()
    {
        return $this->hasMany(ScheduleLog::class, 'id', 'schedule_id');
    }
}
