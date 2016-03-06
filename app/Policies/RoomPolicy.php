<?php

namespace App\Policies;

use App\User;
use App\Room;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    /*
     * Determine if the given user can invite users to the given room.
     *
     * @param \App\User $user
     * @param \App\Room $room
     * @return bool
     */
    public function invite(User $user, Room $room)
    {
        return $user->rooms->contains($room) && $user->can('room-invite');
    }
}
