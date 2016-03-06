<?php

use App\Room;
use App\User;

trait RoomCreator
{
    public function createRoom()
    {
        $room = factory(Room::class)->create();
        $user = factory(User::class)->create();
        $room->setOwner($user);
        return $room;
    }

    public function createRooms($count = 3)
    {
        $rooms = [];

        for ($i = 0; $i < $count; $i++) {
            $room = $this->createRoom();
        }

        return $rooms;
    }
}
