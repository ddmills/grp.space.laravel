<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoomAdministerTest extends TestCase
{

    use VisitsRooms;
    use RoomCreator;
    use ActorCreator;
    use DatabaseTransactions;

    public function testUserRoleHasRoomAdministerPermission()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('room-administer'));
    }

    public function testActorWithRoomAdministerPermissionCanViewSettingsIfTheyOwnRoom()
    {
        $owner = $this->createUserWithRoom();
        $room  = $owner->rooms->first();

        $this
            ->actingAs($owner)
            ->visitRoom($room)
            ->click('Room settings')
            ->seePageIs(route('room.settings', $room->name));
    }

    public function testActorWithRoomAdministerPermissionCantViewSettingsIfTheyDontOwnRoom()
    {
        $user = $this->createUser();
        $room = $this->createRoom();

        $this
            ->actingAs($user)
            ->visitRoom($room)
            ->dontSee('Room settings')
            ->get(route('room.settings', $room->name))
            ->assertResponseStatus(403);

        $room->addMember($user);

        $this
            ->visitRoom($room)
            ->dontSee('Room settings')
            ->get(route('room.settings', $room->name))
            ->assertResponseStatus(403);
    }

    public function testActorWithoutRoomAdministerPermissionCantViewRoomSettings()
    {
        $room = $this->createRoom();

        $this
            ->get(route('room.settings', $room->name))
            ->assertResponseStatus(403);
    }
}
