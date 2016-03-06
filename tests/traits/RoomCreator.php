<?php

use App\Room;
use App\User;

trait RoomCreator
{
    public function createRoomWithOwner($owner)
    {
        $room = factory(Room::class)->create();
        $room->setOwner($owner);
        return $room;
    }

    public function createRoom()
    {
        $user = factory(User::class)->create();
        return $this->createRoomWithOwner($user);
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
