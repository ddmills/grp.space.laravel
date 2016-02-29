<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoomViewOwnedTest extends TestCase
{

    use RoomCreator;
    use ActorCreator;
    use DatabaseTransactions;

    public function testUserHasRoomViewOwnedPermission()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('room-view-owned'));
    }

    public function testActorWithRoomViewOwnedPermissionCanViewOwnRooms()
    {
        $user = $this->createUserWithRooms();

        $this
            ->actingAs($user)
            ->visit(route('dashboard.index', ['user' => $user->username]));

        foreach ($user->rooms as $room) {
            $this->see($room->name);
        }
    }
}
