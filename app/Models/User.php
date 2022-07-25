<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public $incrementing = false;

    protected $fillable = [
        'email',
        'password',
        'is_admin',
        'is_active', 
        'name',
        'honda_id',
        'profile_picture', 
        'device_limit', 
        'personal_token', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
        'is_active',
        'personal_token', 
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
