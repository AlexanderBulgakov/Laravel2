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

    const ROLE_ADMINISTRATOR = 1;
    const ROLE_EVENT_EDITOR = 2;
    const ROLE_SUBSCRIBER = 3;

    public static function getRoles()
    {
        return [
            self::ROLE_ADMINISTRATOR => ['admin' => 'Administrator'],
            self::ROLE_EVENT_EDITOR => ['event.editor' => 'Event Editor'],
            self::ROLE_SUBSCRIBER => ['subscriber' => 'Subscriber'],
        ];
    }

    public function hasRole(string $checkRole)
    {
        $roles = $this->getRoles();

        return isset($roles[$this->role][$checkRole]);
    }

    public function getRoleKey(){
        $roles = $this->getRoles();

        if(isset($roles[$this->role])){
            $keys = array_keys($roles[$this->role]);
            
            return array_shift($keys);
        }

        return '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
