<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomTest extends TestCase
{
    public function testCanCreateNewPublicRoom()
    {
        $date = new DateTime();
        $roomName = 'test-room-' . $date->getTimestamp();

        $this
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->select('public', 'privilege')
            ->press(Lang::get('room.create.finalize'))
            ->seePageIs(route('room.show', ['room' => $roomName]));
    }
}
