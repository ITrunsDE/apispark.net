<?php

namespace App\Models;

// use Illuminate\Contracts\User\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function repositories(): HasMany
    {
        return $this->hasMany(related: Repository::class);
    }

    public function endpoints(): HasMany
    {
        return $this->hasMany(related: Endpoint::class);
    }

    public function endpointJobs(): HasMany
    {
        return $this->hasMany(related: EndpointJob::class);
    }
}
