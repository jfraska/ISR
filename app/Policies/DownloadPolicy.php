<?php

namespace App\Policies;

use App\Models\Download;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DownloadPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Download $download): bool
    {
        if ($download->status === "published") {
            return true;
        }

        if ($user === null) {
            return false;
        }

        if ($user->can('download:all')) {
            return true;
        }

        return $user->id === $download->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('download:create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Download $download): bool
    {
        return $user->id === $download->user_id || $user->can('download:all');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Download $download): bool
    {
        return ($user->id === $download->user_id && $download->status !== "published") || $user->can('download:all');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Download $download): bool
    {
        return $user->id === $download->user_id || $user->can('download:all');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Download $download): bool
    {
        return $user->can('download:delete');
    }
}
