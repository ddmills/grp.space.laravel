<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomTest extends TestCase
{
    public function testCanCreatingANewRoomWillRedirectToNewRoomPage()
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

    public function testNameFieldIsRequired()
    {
        $this
            ->visit(route('room.create'))
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }
}
