<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoomViewAllTest extends TestCase
{

    use VisitsRooms;
    use CreatesRooms;
    use CreatesActors;
    use DatabaseTransactions;

    public function testAdminRoleHasRoomViewAllPermission()
    {
        $admin = $this->createAdmin();
        $this->assertTrue($admin->can('room-view-all'));
    }

    public function testActorWithRoomViewAllPermissionCanViewNonAssociatedRooms()
    {
        $admin = $this->createAdmin();
        $room = $this->createRoom();

        $this
            ->actingAs($admin)
            ->visitRoom($room)
            ->assertResponseStatus(200);
    }

}
