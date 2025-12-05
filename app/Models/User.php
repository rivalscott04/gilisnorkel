<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['has_permissions'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function hasPermissions(): Attribute
    {
        return new Attribute(
            get: fn () => collect(config('constants.permissions.'.$this->role)),
        );
    }
    public function is_admin(): bool
    {
        return $this->role=='admin';
    }
}
