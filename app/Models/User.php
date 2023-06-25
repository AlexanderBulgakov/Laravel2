<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMINISTRATOR = 'admin';
    const ROLE_EVENT_EDITOR = 'event.editor';
    const ROLE_SUBSCRIBER = 'subscriber';

    public static function getRoles()
    {
        return [
            self::ROLE_ADMINISTRATOR => 'Administrator',
            self::ROLE_EVENT_EDITOR => 'Event Editor',
            self::ROLE_SUBSCRIBER => 'Subscriber',
        ];
    }

    public function hasRole(string $role)
    {
        return $this->role === $role;
    }

    public function getRoleKey()
    {
        return $this->role;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
