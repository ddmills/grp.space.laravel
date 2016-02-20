<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomTest extends TestCase
{
    public function testCanCreateNewPublicRoom()
    {
        $roomName = 'test-room-' . microtime();

        $this
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->select('public', 'privilege')
            ->click('create')
            ->seeRouteIs(route('room.show', ['room' => $roomName]));
    }
}
