<?php

namespace App\Policies;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompetitionPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Competition $competition): bool
    {
        if ($competition->status === "published") {
            return true;
        }

        if ($user === null) {
            return false;
        }

        if ($user->can('competition:all')) {
            return true;
        }

        return $user->id === $competition->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('competition:create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Competition $competition): bool
    {
        return $user->id === $competition->user_id || $user->can('competition:all');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Competition $competition): bool
    {
        return ($user->id === $competition->user_id && $competition->status !== "published") || $user->can('competition:all');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Competition $competition): bool
    {
        return $user->id === $competition->user_id || $user->can('competition:all');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Competition $competition): bool
    {
        return $user->can('competition:delete');
    }
}
