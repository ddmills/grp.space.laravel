<?php

use App\Room;

trait RoomCreator
{
    public function createRoom()
    {
        return factory(Room::class)->create();
    }

    public function createRooms($count = 3)
    {
        return factory(Room::class, $count)->create();
    }
}
