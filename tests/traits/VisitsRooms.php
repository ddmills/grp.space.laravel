<?php

trait VisitsRooms {

    private function getRoomName($identifier)
    {
        $roomName = null;

        if (is_int($identifier)) {
            $roomName = Room::find($identifier)->name;
        }

        if (is_string($identifier)) {
            $roomName = $identifier;
        }

        if (is_object($identifier)) {
            $roomName = $identifier->name;
        }

        return $roomName;
    }

    public function visitRoom($identifier)
    {
        $roomName = $this->getRoomName($identifier);
        return $this->visit(route('room.show', $roomName));
    }

    public function visitRoomSettings($identifier)
    {
        $roomName = $this->getRoomName($identifier);
        return $this->visit(route('room.settings', $roomName));
    }

}
