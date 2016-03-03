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

        $this
            ->actingAs($owner)
            ->visit(route('room.show', $owner->rooms->first()->name))
            ->type($user->username, 'identifier')
            ->press('Invite user')
            ->see('User has been invited');
    }
}
