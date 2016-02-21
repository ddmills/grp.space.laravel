<?php

use App\Room;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomTest extends TestCase
{

    use DatabaseTransactions;

    public function testCanCreatingANewRoomWillRedirectToNewRoomPage()
    {
        $date = new DateTime();
        $roomName = 'test-room-' . $date->getTimestamp();

        $this
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->select('public', 'access')
            ->press(Lang::get('room.create.finalize'))
            ->seePageIs(route('room.show', ['room' => $roomName]));
    }

    public function testRoomCreationAddsRoomToDatabaseCorrectly()
    {
        $date = new DateTime();
        $roomName = 'test-room-' . $date->getTimestamp();

        $this
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->press(Lang::get('room.create.finalize'))
            ->seeInDatabase('rooms', ['name' => $roomName]);
    }

    public function testNameFieldIsRequired()
    {
        $this
            ->visit(route('room.create'))
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }

    public function testNameFieldCannotHaveSpaces()
    {
        $roomName = "Cannot have spaces";

        $this
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.roomname', ['attribute' => 'name']));
    }

    public function testNameFieldCannotBeEmpty()
    {
        $this
            ->visit(route('room.create'))
            ->type('', 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }

    public function testNameFieldCannotBeJustWhitespace()
    {
        $this
            ->visit(route('room.create'))
            ->type(' ', 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }

    public function testRoomShowPageContainsRoomInfo()
    {
        $room = factory(Room::class)->make();
        $room->save();

        $this
            ->visit(route('room.show', ['room' => $room->name]))
            ->see($room->name)
            ->see($room->access)
            ->see($room->description);
    }
}
