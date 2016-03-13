<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChatTest extends TestCase
{
    use CreatesRooms;
    use VisitsRooms;
    use CreatesActors;
    use DatabaseTransactions;

    public function testAuthenticatedUserCanSeeChat()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $this
            ->actingAs($user)
            ->visitRoom($room)
            ->see('Chat');
    }

    public function testChatMessagesPersist()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $this->markTestIncomplete();
    }
}
