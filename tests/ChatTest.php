<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChatTest extends TestCase
{
    use RoomCreator;
    use ActorCreator;
    use DatabaseTransactions;

    public function testAuthenticatedUserCanSeeChat()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $this
            ->actingAs($user)
            ->visit(route('room.show', ['room' => $room->name]))
            ->see('Chat');
    }
}
