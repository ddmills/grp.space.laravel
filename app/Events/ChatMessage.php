<?php

namespace App\Events;

use App\Models\Message;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatMessage extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $message;
    public $author;
    public $room;
    public $timestamp;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
        $this->author = $message->author;
        $this->room = $message->room;
        $this->timestamp = $message->created_at;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['chat:message'];
    }
}
