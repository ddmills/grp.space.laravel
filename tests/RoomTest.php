<?php

use App\Room;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomTest extends TestCase
{

    use CreatesRooms;
    use VisitsRooms;
    use CreatesActors;
    use DatabaseTransactions;

    public function testCanCreatingANewRoomWillRedirectToNewRoomPage()
    {
        $date = new DateTime();
        $roomName = 'test-room-' . $date->getTimestamp();

        $this
            ->actingAs($this->createUser())
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->select('public', 'access')
            ->press(Lang::get('room.create.finalize'))
            ->seePageIs(route('room.show', ['room' => $roomName]));
    }

    public function testRoomCreationAddsRoomToDatabase()
    {
        $date = new DateTime();
        $roomName = 'test-room-' . $date->getTimestamp();

        $this
            ->actingAs($this->createUser())
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->press(Lang::get('room.create.finalize'))
            ->seeInDatabase('rooms', ['name' => $roomName]);
    }

    public function testNameFieldIsRequired()
    {
        $this
            ->actingAs($this->createUser())
            ->visit(route('room.create'))
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }

    public function testNameFieldCannotHaveSpaces()
    {
        $roomName = "Cannot have spaces";

        $this
            ->actingAs($this->createUser())
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.custom.name.roomname'));
    }

    public function testNameFieldCannotBeEmpty()
    {
        $this
            ->actingAs($this->createUser())
            ->visit(route('room.create'))
            ->type('', 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }

    public function testNameFieldCannotBeJustWhitespace()
    {
        $this
            ->actingAs($this->createUser())
            ->visit(route('room.create'))
            ->type(' ', 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }

    public function testNameFieldCannotBeQuestionMark()
    {
        $this
            ->actingAs($this->createUser())
            ->visit(route('room.create'))
            ->type('?', 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.custom.name.roomname'));
    }

    public function testRoomShowPageContainsRoomInfo()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $this
            ->actingAs($user)
            ->visitRoom($room)
            ->see($room->name)
            ->see($room->access)
            ->see($room->description);
    }

    public function testCannotCreateRoomWithTakenName()
    {
        $room = $this->createRoom();

        $this
            ->actingAs($this->createUser())
            ->visit(route('room.create'))
            ->type($room->name, 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.unique', ['attribute' => 'name']));
    }
}
