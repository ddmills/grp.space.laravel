<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoomCreateTest extends TestCase
{

    use CreatesActors;
    use DatabaseTransactions;

    public function testUserRoleHasCreateRoomPermission()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('room-create'));
    }

    public function testActorWithRoomCreatePermissionCanCreateRoom()
    {
        $user = $this->createUser();
        $date = new DateTime();
        $roomName = 'test-room-' . $date->getTimestamp();

        $this
            ->actingAs($user)
            ->visit(route('room.create'))
            ->type($roomName, 'name')
            ->press(Lang::get('room.create.finalize'))
            ->seeInDatabase('rooms', ['name' => $roomName]);
    }

    public function testActorWithoutRoomCreatePermissionCantCreateRoom()
    {
        $this
            ->get(route('room.create'))
            ->assertResponseStatus(403);
    }
}
