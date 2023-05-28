<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PDO;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

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

    function getRedirectRoute()
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
}
