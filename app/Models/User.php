<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Класс модели пользователя.
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'creator_id',
        'user_role_id',
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

    /**
     * Связь "Многие к одному" с моделью "BirdDetection" (фиксация птицы).
     */
    public function birdDetections(): HasMany
    {
        return $this->hasMany(BirdDetection::class, 'agent_id');
    }

    /**
     * Связь "Один ко многим" с моделью "User" (пользователь).
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Связь "Один ко многим" с моделью "User" (пользователь).
     */
    public function createdUsers(): HasMany
    {
        return $this->hasMany(User::class, 'creator_id');
    }

    /**
     * Связь "Один ко многим" с моделью "UserRole" (роль пользователя).
     */
    public function userRole(): BelongsTo
    {
        return $this->belongsTo(UserRole::class);
    }
}
