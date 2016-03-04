<?php

trait VisitsRooms {

    public function visitRoom($identifier)
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

        return $this->visit(route('room.show', $roomName));
    }

}
