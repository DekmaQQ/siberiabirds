<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $userRole = $user->userRole->title;

        // просматривать список пользователей могут только админ, куратор и агент
        return $userRole == 'admin' || $userRole == 'tutor' || $userRole == 'agent';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        $userRole = $user->userRole->title;
        $userId = $user->id;
        $modelId = $model->id;
        $modelCreatorId = $model->creator_id;
        // $modelRole = $model->userRole->title;

        if ($userRole == 'admin') {
            // админ может просматривать любой аккаунт
            return true;
        } elseif ($userRole == 'tutor') {
            // куратор может просматривать свой аккаунт и аккаунты тех, кого он создал
            return $userId == $modelId || $userId == $modelCreatorId;
        } else {
            // все остальные роли могут просматривать только свои аккаунты
            return $userId == $modelId;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $userRole = $user->userRole->title;

        return $userRole == 'admin' || $userRole == 'tutor';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        $userRole = $user->userRole->title;
        $userId = $user->id;
        $modelRole = $model->userRole->title;
        $modelCreatorId = $user->creator_id;
        // $modelId = $model->id;

        if ($userRole == 'tutor') {
            return $userId == $modelCreatorId && $modelRole == 'agent';
        } elseif ($userRole == 'admin') {
            return $userId == $modelCreatorId && $modelRole != 'agent';          
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        $userRole = $user->userRole->title;
        $userId = $user->id;
        $modelRole = $model->userRole->title;
        $modelCreatorId = $model->creator_id;

        if ($userRole == 'tutor') {
            return $userId == $modelCreatorId && $modelRole == 'agent';
        } elseif ($userRole == 'admin') {
            return $userId == $modelCreatorId && $modelRole != 'agent';
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }
}
