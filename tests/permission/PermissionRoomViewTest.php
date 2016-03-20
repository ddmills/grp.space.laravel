<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoomViewTest extends TestCase
{
    use VisitsRooms;
    use CreatesActors;
    use CreatesRooms;
    use DatabaseTransactions;

    public function testUserRoleHasRoomViewPermission()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('room-view'));
    }

    public function testActorWithRoomViewPermissionCanViewOwnedRooms()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $this
            ->actingAs($user)
            ->visitRoom($room)
            ->assertResponseStatus(200);
    }

    public function testActorWithRoomViewPermissionCanViewFollowedRooms()
    {
        $user = $this->createUser();
        $room = $this->createRoom();

        $room->addMember($user);

        $this
            ->actingAs($user)
            ->visitRoom($room)
            ->assertResponseStatus(200);
    }

    public function testActorWithoutRoomViewPermissionCantViewRooms()
    {
        $room = $this->createRoom();

        $this
            ->get(route('room.show', $room->name))
            ->assertResponseStatus(403);
    }
}
