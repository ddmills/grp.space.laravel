<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChatTest extends TestCase
{
    use RoomCreator;
    use VisitsRooms;
    use ActorCreator;
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
}
