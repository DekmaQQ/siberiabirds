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

        return $userRole == 'admin' || $userRole == 'tutor';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        $userRole = $user->userRole->title;
        $userId = $user->id;
        $modelId = $model->id;
        $modelRole = $model->userRole->title;

        if ($userRole == 'admin') {
            return true;
        } elseif ($userRole == 'tutor') {
            return $modelRole != 'admin';
        } else {
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
        $modelId = $model->id;

        if ($userRole == 'tutor') {
            return $userId == $modelCreatorId && $modelRole == 'agent';
        } elseif ($userRole == 'admin') {
            if ($modelRole == 'admin') {
                return $userId == $modelCreatorId || $userId == $modelId;
            } else {
                return $modelRole != 'agent';
            }            
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
            return $userId = $modelCreatorId;
        } elseif ($userRole == 'admin') {
            if ($modelRole == 'admin') {
                return $userId == $modelCreatorId;
            } else {
                return true;
            }
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
