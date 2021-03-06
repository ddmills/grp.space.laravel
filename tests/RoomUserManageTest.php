<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomUserManageTest extends TestCase
{

    use CreatesActors;
    use VisitsRooms;
    use CreatesRooms;
    use DatabaseTransactions;

    public function testAcceptingRoomInvitationWillAddUserToRoom()
    {
        $owner = $this->createUserWithRoom();
        $user  = $this->createUser();
        $room  = $owner->rooms->first();

        $this->actingAs($owner);
        $room->inviteUser($user);

        $this
            ->actingAs($user)
            ->visit(route('user.dashboard', $user->username))
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
            ->visitRoomSettings($owner->rooms->first())
            ->type('doesnotexist', 'identifier')
            ->press('Invite user')
            ->see(Lang::get('room.invite.notfound', ['identifier' => 'doesnotexist']));
    }

    public function testRoomOwnerCannotInviteSelf()
    {
        $owner = $this->createUserWithRoom();
        $room  = $owner->rooms->first();

        $this
            ->actingAs($owner)
            ->visitRoomSettings($room)
            ->type($owner->username, 'identifier')
            ->press('Invite user')
            ->see(Lang::get('room.invite.failure', ['username' => $owner->username]));
    }

    public function testRoomOwnerCannotInviteMemberOfRoom()
    {
        $owner = $this->createUserWithRoom();
        $user  = $this->createUser();
        $room  = $owner->rooms->first();

        $room->members()->attach($user);

        $this
            ->actingAs($owner)
            ->visitRoomSettings($room)
            ->type($user->username, 'identifier')
            ->press('Invite user')
            ->see(Lang::get('room.invite.failure', ['username' => $user->username]));
    }
}
