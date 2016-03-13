<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionUserViewTest extends TestCase
{

    use CreatesActors;
    use DatabaseTransactions;

    public function testUserRoleHasUserViewPermission()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('user-view'));
    }

    public function testActorWithUserViewPermissionCanViewUsersOfSameRoom()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $otherUser = $this->createUser();
        $otherMember = $this->createUser();

        $room->addMember($otherUser);
        $room->addMember($otherMember);

        $this
            ->actingAs($user)
            ->visit(route('user.show', $otherUser->username))
            ->see($otherUser->username);

        $this
            ->actingAs($otherMember)
            ->visit(route('user.show', $otherUser->username))
            ->see($otherUser->username);
    }

    public function testActorWithUserViewPermissionCantViewUsersOfDifferentRoom()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $otherUser = $this->createUser();
        $otherMember = $this->createUser();

        $room->addMember($otherMember);

        $this
            ->actingAs($user)
            ->get(route('user.show', $otherUser->username))
            ->assertResponseStatus(403);

        $this
            ->actingAs($otherMember)
            ->get(route('user.show', $otherUser->username))
            ->assertResponseStatus(403);
    }

    public function testActorWithoutUserViewPermissionCantViewUserProfiles()
    {
        $user = $this->createUser();
        $otherUser = $this->createUser();

        $this
            ->actingAs($user)
            ->get(route('user.show', $otherUser->username))
            ->assertResponseStatus(403);
    }
}
