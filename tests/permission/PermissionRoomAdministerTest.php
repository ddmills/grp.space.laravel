<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoomAdministerTest extends TestCase
{

    use VisitsRooms;
    use CreatesRooms;
    use CreatesActors;
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
            ->visit(route('room.settings', $room->name))
            ->assertResponseStatus(200);
    }

    public function testActorWithRoomAdministerPermissionCantViewSettingsIfTheyDontOwnRoom()
    {
        $user = $this->createUser();
        $room = $this->createRoom();
        $room->addMember($user);

        $this
            ->actingAs($user)
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
            ->assertResponseStatus(302);
    }
}
