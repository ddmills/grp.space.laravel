<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomUserManageTest extends TestCase
{

    use ActorCreator;
    use RoomCreator;
    use DatabaseTransactions;

    public function testRoomOwnerCanInviteExistingUsers()
    {
        $owner = $this->createUserWithRoom();
        $user  = $this->createUser();
        $room  = $owner->rooms->first();

        $this
            ->actingAs($owner)
            ->visit(route('room.show', $room->name))
            ->type($user->username, 'identifier')
            ->press('Invite user')
            ->see('User has been invited');

        $this
            ->actingAs($user)
            ->visit(route('dashboard.index', ['user' => $user->username]))
            ->see($owner->name . ' invited you to join ' . $room->name);
    }

    public function testRoomOwnerCannotInviteNonExistingUsers()
    {
        $owner = $this->createUserWithRoom();

        $this
            ->actingAs($owner)
            ->visit(route('room.show', $owner->rooms->first()->name))
            ->type('doesnotexist', 'identifier')
            ->press('Invite user')
            ->see('User not found');
    }

    public function testRoomOwnerCannotInviteSelf()
    {
        $owner = $this->createUserWithRoom();
        $room  = $owner->rooms->first();

        $this
            ->actingAs($owner)
            ->visit(route('room.show', $room->name))
            ->type($owner->username, 'identifier')
            ->press('Invite user')
            ->see('User could not be invited');
    }
}
