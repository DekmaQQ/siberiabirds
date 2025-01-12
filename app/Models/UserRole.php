<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Класс модели роли пользователя.
 */
class UserRole extends Model
{
    protected $fillable = [
        'title'
    ];

    /**
     * Связь "Один ко многим" с моделью "User" (пользователь).
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
