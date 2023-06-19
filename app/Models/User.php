<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRedirectRoute()
    {
        if (Auth::user()->hasRole('admin')) {
            $path = '/admin/dashboard/';
        } elseif (Auth::user()->hasRole('teacher')) {
            $path = '/teacher/dashboard/';
        } else {
            $path = '/student/dashboard/';
        }
        return $path;
    }

    public function presence()
    {
        return $this->hasMany(Presence::class, 'id', 'user_id');
    }

    public function userHasGrade()
    {
        return $this->hasMany(UserHasGrade::class, 'id', 'user_id');
    }

    public function getGradeName()
    {
        $userId = Auth::user()->id;
        $grade = UserHasGrade::where('user_id', $userId)->first();
        $gradeName = Grade::find($grade->grade_id)->name;
        return $gradeName;
    }

    public function getGradeId()
    {
        $userId = Auth::user()->id;
        $grade = UserHasGrade::where('user_id', $userId)->first();
        $gradeId = Grade::find($grade->grade_id)->id;
        return $gradeId;
    }
}
