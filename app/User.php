<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Position;
use App\Schedule;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'phone', 'role_id', 'position_id', 'password', 'username', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
