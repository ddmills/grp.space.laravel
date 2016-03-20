<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoomChatTest extends TestCase
{

    use VisitsRooms;
    use CreatesRooms;
    use CreatesActors;
    use DatabaseTransactions;

    public function testUserRoleHasRoomChatPermission()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('room-chat'));
    }

    public function testActorWithRoomChatPermissionCanViewOwnRoomChat()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $this
            ->actingAs($user)
            ->visitRoom($room)
            ->seeElement('.chat');
    }

    public function testActorWithRoomChatPermissionCanViewFollowedRoomChat()
    {
        $user = $this->createUser();
        $room = $this->createRoom();

        $room->addMember($user);

        $user->fresh();

        $this
            ->actingAs($user)
            ->visitRoom($room)
            ->seeElement('.chat');
    }

    public function testActorWithoutRoomChatPermissionCantViewChats()
    {
        $room = $this->createRoom();

        $this
            ->get(route('room.show', $room->name))
            ->assertResponseStatus(302);
    }
}
