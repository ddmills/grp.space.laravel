<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Room;
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

    /*
     * Determine if the given user can chat in the given room.
     *
     * @param \App\User $user
     * @param \App\Room $room
     * @return bool
     */
    public function chat(User $user, Room $room)
    {
        if ($user->can('room-chat-all')) {
            return true;
        }

        if ($user->can('room-chat')) {
            return $user->following->contains($room) || $user->rooms->contains($room);
        }

        return false;
    }

    /*
     * Determine if the given user can administer the given room.
     *
     * @param \App\User $user
     * @param \App\Room $room
     * @return bool
     */
    public function administer(User $user, Room $room)
    {
        return $user->rooms->contains($room) && $user->can('room-administer');
    }
}
