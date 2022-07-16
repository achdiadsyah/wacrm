<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'is_admin',
        'is_active', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
        'is_active',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
