<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FirstTimeStepsTest extends TestCase
{

    use CreatesActors;
    use CreatesRooms;
    use VisitsRooms;
    use DatabaseTransactions;

    public function testStepsAreShownOnHomepageIfNotLoggedIn()
    {
        $this
            ->visit(route('home'))
            ->seeElement('.starting-steps')
            ->seeInElement('.starting-steps > .step.active', 'Step 1');
    }

    public function testStepsAreShownOnRegistrationPage()
    {
        $this
            ->visit(route('auth.register'))
            ->seeElement('.starting-steps')
            ->seeInElement('.starting-steps > .step.active', 'Step 1');
    }

    public function testStepsAreShownOnRoomCreatePageForUserWithoutAnyRooms()
    {
        $user = $this->createUser();

        $this
            ->actingAs($user)
            ->visit(route('room.create'))
            ->seeElement('.starting-steps')
            ->seeInElement('.starting-steps > .step.active', 'Step 2');
    }

    public function testStepsAreNotShownOnRoomCreatePageForUserWithARoom()
    {
        $userWithRoom = $this->createUserWithRoom();

        $this
            ->actingAs($userWithRoom)
            ->visit(route('room.create'))
            ->dontSeeElement('.starting-steps');
    }

    public function testThatStepsAreNotShowForAUserWhoIsAMemberOfARoom()
    {
        $user = $this->createUser();
        $room = $this->createRoom();

        $room->addMember($user);

        $this
            ->actingAs($user)
            ->visit(route('home'))
            ->dontSeeElement('.starting-steps')
            ->visit(route('room.create'))
            ->dontSeeElement('.starting-steps');
    }

    public function testStepsAreShownOnRoomInvitePageForRoomWithNoMembers()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $this
            ->actingAs($user)
            ->visit(route('room.settings', $room->name))
            ->seeElement('.starting-steps')
            ->seeInElement('.starting-steps > .step.active', 'Step 3');
    }

    public function testStepsAreNotShownOnRoomInvitePageForRoomWithMembers()
    {
        $user = $this->createUserWithRoom();
        $otherUser = $this->createUser();

        $room = $user->rooms->first();
        $room->addMember($otherUser);

        $this
            ->actingAs($user->fresh())
            ->visit(route('room.settings', $room->name))
            ->dontSeeElement('.starting-steps');
    }
}
