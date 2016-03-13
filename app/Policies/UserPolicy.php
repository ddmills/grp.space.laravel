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
        if ($user->can('user-view')) {
            return !$user->accessibleRooms()->intersect($otherUser->accessibleRooms())->isEmpty();
        }
        return false;
    }
}
