<?php

use App\Models\Message;
use App\Events\ChatMessage;
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

    public function testChatMessagesArePersisted()
    {
        $user = $this->createUserWithRoom();
        $room = $user->rooms->first();

        $content = 'Test message content';

        $message = Message::create(['content' => $content]);
        $message->author()->associate($user);
        $message->room()->associate($room);
        $message->save();

        event(new ChatMessage($message));

        $this
            ->actingAs($user)
            ->visitRoom($room)
            ->see($content);
    }
}
