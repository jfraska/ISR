<?php

namespace App\Policies;

use App\Models\Achievement;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AchievementPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Achievement $achievement): bool
    {
        if ($achievement->status === "published") {
            return true;
        }

        if ($user === null) {
            return false;
        }

        if ($user->can('achievement:all')) {
            return true;
        }

        return $user->id === $achievement->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('achievement:create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Achievement $achievement): bool
    {
        return $user->id === $achievement->user_id || $user->can('achievement:all');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Achievement $achievement): bool
    {
        return ($user->id === $achievement->user_id && $achievement->status !== "published") || $user->can('achievement:all');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Achievement $achievement): bool
    {
        return $user->id === $achievement->user_id || $user->can('achievement:all');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Achievement $achievement): bool
    {
        return $user->can('achievement:delete');
    }
}
