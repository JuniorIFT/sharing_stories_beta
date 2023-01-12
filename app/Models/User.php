<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar_url',
        'auth_type',
        'social_id',
        'social_token',
        'biography',
        'birthday',
        'composer',
        'email',
        'illustrator',
        'name',
        'nickname',
        'number_follower',
        'number_like',
        'phone',
        'singer',
        'translator',
        'legal_age',
        'writer',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_active',
        'is_admin',
        'is_banned',
        'is_moderator',
        'email_verified_at',
        'social_id',
        'social_token',
        'auth_type',
        'composer',
        'proof_work_coin',
        'singer',
        'translator',
        'phone',
        'updated_at',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
