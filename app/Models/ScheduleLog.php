<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleLog extends Model
{
    use HasFactory;
    protected $table = 'schedule_logs';

    protected $fillable = [
        'schedule_id',
        'time_open',
        'time_close'
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }
}
