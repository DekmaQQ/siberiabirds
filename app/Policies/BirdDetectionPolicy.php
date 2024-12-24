<?php

namespace App\Policies;

use App\Models\BirdDetection;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BirdDetectionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BirdDetection $birdDetection): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->userRole->title == 'agent';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BirdDetection $birdDetection): bool
    {
        $userId = $user->id;
        $userRole = $user->userRole->title;
        $creatorIdOfUserThatCreatedDetection = $birdDetection->agent->creator->id;

        return $userRole == 'tutor' && $userId == $creatorIdOfUserThatCreatedDetection;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BirdDetection $birdDetection): bool
    {
        $userId = $user->id;
        $userRole = $user->userRole->title;
        $creatorIdOfUserThatCreatedDetection = $birdDetection->agent->creator->id;

        return $userRole == 'tutor' && $userId == $creatorIdOfUserThatCreatedDetection;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BirdDetection $birdDetection): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BirdDetection $birdDetection): bool
    {
        //
    }
}
