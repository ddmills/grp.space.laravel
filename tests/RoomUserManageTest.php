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
            ->see(Lang::get('room.invite.success', ['username' => $user->username]));

        $this
            ->actingAs($user)
            ->visit(route('dashboard.index', ['user' => $user->username]))
            ->see($owner->name . ' invited you to join ' . $room->name);
    }

    public function testAcceptingRoomInvitationWillAddUserToRoom()
    {
        $owner = $this->createUserWithRoom();
        $user  = $this->createUser();
        $room  = $owner->rooms->first();

        $this->actingAs($owner);
        $room->inviteUser($user);

        $this
            ->actingAs($user)
            ->visit(route('dashboard.index', $user->username))
            ->see($owner->name . ' invited you to join ' . $room->name)
            ->click('Join')
            ->seePageIs(route('room.show', $room->name))
            ->see(Lang::get('room.joined.success', ['room' => $room->name]));

        $room->fresh();
        $user->fresh();

        $this->assertTrue($room->members->contains($user));
        $this->assertTrue($user->following->contains($room));
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
            ->see(Lang::get('room.invite.failure', ['username' => $owner->username]));
    }
}
