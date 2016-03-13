<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    /*
     * Determine if the given user can view the other user's profile
     *
     * @param \App\User $user
     * @param \App\User $otherUser
     * @return bool
     */
    public function view(User $user, User $otherUser)
    {
        if ($user->can('user-view-all')) {
            return true;
        }

        if ($user->can('user-view')) {
            return !$user->accessibleRooms()->intersect($otherUser->accessibleRooms())->isEmpty();
        }

        return false;
    }

    /*
     * Determine if the given user can view the other user's dashboard
     *
     * @param \App\User $user
     * @param \App\User $otherUser
     * @return bool
     */
    public function viewDashboard(User $user, User $otherUser)
    {
        if ($user->can('user-view-all-dashboard')) {
            return true;
        }

        if ($user->can('user-view-dashboard')) {
            return $user->id == $otherUser->id;
        }
        return false;
    }
}
