<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoomChatAllTest extends TestCase
{

    use VisitsRooms;
    use CreatesRooms;
    use CreatesActors;
    use DatabaseTransactions;

    public function testAdminRoleHasRoomChatAllPermission()
    {
        $admin = $this->createAdmin();
        $this->assertTrue($admin->can('room-chat-all'));
    }

    public function testActorWithRoomChatAllPermissionCanViewAllChats()
    {
        $admin = $this->createAdmin();
        $room = $this->createRoom();

        $this
            ->actingAs($admin)
            ->visitRoom($room)
            ->seeElement('.chat');
    }

    public function testActorWithoutRoomChatAllPermissionCantViewAllChats()
    {
        $user = $this->createUser();
        $room = $this->createRoom();

        $this
            ->actingAs($user)
            ->get(route('room.show', $room->name))
            ->assertResponseStatus(403);
    }
}
