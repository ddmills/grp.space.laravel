<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomUserManageTest extends TestCase
{

    use ActorCreator;
    use VisitsRooms;
    use RoomCreator;
    use DatabaseTransactions;

    public function testRoomOwnerCanInviteExistingUsers()
    {
        $owner = $this->createUserWithRoom();
        $user  = $this->createUser();
        $room  = $owner->rooms->first();

        $this
            ->actingAs($owner)
            ->visitRoom($room)
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
            ->visitRoom($owner->rooms->first())
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
            ->visitRoom($room)
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
            ->visitRoom($room)
            ->type($user->username, 'identifier')
            ->press('Invite user')
            ->see(Lang::get('room.invite.failure', ['username' => $user->username]));
    }
}
