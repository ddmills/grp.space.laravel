<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomTest extends TestCase
{

    use VisitsRooms;
    use CreatesRooms;
    use CreatesActors;
    use DatabaseTransactions;

    public function testCanCreatingANewRoomWillRedirectToNewRoomPage()
    {
        $user = $this->createUser();
        $date = new DateTime();
        $roomName = 'test-room-' . $date->getTimestamp();

        $this
            ->actingAs($user)
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->select('public', 'access')
            ->press(Lang::get('room.create.finalize'))
            ->seePageIs(route('room.show', ['room' => $roomName]));
    }

    public function testRoomCreationAddsRoomToDatabase()
    {
        $user = $this->createUser();
        $date = new DateTime();
        $roomName = 'test-room-' . $date->getTimestamp();

        $this->be($user);

        $this
            ->actingAs($user)
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->press(Lang::get('room.create.finalize'))
            ->seeInDatabase('rooms', ['name' => $roomName]);
    }

    public function testNameFieldIsRequired()
    {
        $user = $this->createUser();

        $this
            ->actingAs($user)
            ->visit(route('room.create'))
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }

    public function testNameFieldCannotHaveSpaces()
    {
        $user = $this->createUser();
        $roomName = "Cannot have spaces";

        $this
            ->actingAs($user)
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.custom.name.roomname'));
    }

    public function testNameFieldCannotBeEmpty()
    {
        $user = $this->createUser();

        $this
            ->actingAs($user)
            ->visit(route('room.create'))
            ->type('', 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }

    public function testNameFieldCannotBeJustWhitespace()
    {
        $user = $this->createUser();

        $this
            ->actingAs($user)
            ->visit(route('room.create'))
            ->type(' ', 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.required', ['attribute' => 'name']));
    }

    public function testNameFieldCannotBeQuestionMark()
    {
        $user = $this->createUser();

        $this
            ->actingAs($user)
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
        $user = $this->createUser();
        $room = $this->createRoom();

        $this
            ->actingAs($user)
            ->visit(route('room.create'))
            ->type($room->name, 'name')
            ->press(Lang::get('room.create.finalize'))
            ->see(Lang::get('validation.unique', ['attribute' => 'name']));
    }
}
