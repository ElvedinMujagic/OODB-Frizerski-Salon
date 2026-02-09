<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    const ROLE_CLIENT  = 'client';
    const ROLE_STYLIST = 'stylist';
    const ROLE_ADMIN   = 'admin';
    use HasApiTokens;

    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'role',
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


    protected $appends = [
        'profile_photo_url',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isClient(): bool
    {
        return $this->role === self::ROLE_CLIENT;
    }

    public function isStylist(): bool
    {
        return $this->role === self::ROLE_STYLIST;
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function clientAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'client_id');
    }

    public function stylistAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'stylist_id');
    }

    public function workHours(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(WorkHours::class);
    }

    public static function roles(): array
    {
        return [self::ROLE_CLIENT, self::ROLE_STYLIST, self::ROLE_ADMIN];
    }
}
