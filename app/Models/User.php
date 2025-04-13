<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasFactory, Notifiable,CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email', 
        'password',
        'role_id',
        'img',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($permissionName)
    {
        return $this->role->permissions->contains('name', $permissionName);
    }

    public function hasRole($role)
    {
        return $this->role()->where('name', $role)->exists();
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            return $this->role()->whereIn('name', $roles)->exists();
        }
        return $this->hasRole($roles);
    }


}
