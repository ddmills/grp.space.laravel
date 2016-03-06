<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoomInviteTest extends TestCase
{

    use VisitsRooms;
    use RoomCreator;
    use ActorCreator;
    use DatabaseTransactions;

    public function testUserRoleHasRoomInvitePermission()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('room-invite'));
    }

    public function testActorWithRoomInvitePermissionCanInviteIfTheyOwnRoom()
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

    public function testActorWithRoomInvitePermissionCantInviteIfTheyDontOwnRoom()
    {
        $user = $this->createUser();
        $room = $this->createRoom();
        $userToBeInvited = $this->createUser();

        // try inviting when not associated with room
        $this->actingAs($user);
        $invited = $room->inviteUser($userToBeInvited);
        $this->assertFalse($invited);

        // try inviting when room member
        $room->addMember($user);
        $invited = $room->inviteUser($userToBeInvited);
        $this->assertFalse($invited);

        // make sure they can't see invite form
        $this->visitRoom($room)->dontSee('Invite user');
    }

    public function testActorWithoutRoomInvitePermissionCantInvite()
    {
        $room = $this->createRoom();
        $userToBeInvited = $this->createUser();
        $invited = $room->inviteUser($userToBeInvited);
        $this->assertFalse($invited);
    }
}
