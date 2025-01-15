<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Auth\Access\Response;

class UserRolePolicy
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
    public function view(User $user, UserRole $userRole): bool
    {
        $userRole = $user->userRole->title;

        return $userRole == 'admin' || $userRole == 'tutor';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->userRole->title == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserRole $userRole): bool
    {
        return $user->userRole->title == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserRole $userRole): bool
    {
        return $user->userRole->title == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserRole $userRole): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserRole $userRole): bool
    {
        //
    }
}
