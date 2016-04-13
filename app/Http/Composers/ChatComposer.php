<?php

namespace App\Http\Composers;

use Route;
use Auth;
use App\Models\Room;
use App\Models\Message;
use App\Facades\JSGlobals;
use Illuminate\Contracts\View\View;

class ChatComposer {

    public function compose(View $view)
    {
        $roomName = Route::current()->parameters()['room'];
        $room = Room::where('name', $roomName)->firstOrFail();
        $messages = Message::where('room_id', $room->id)->get();
        $transformedMessages = [];

        foreach ($messages as $message) {
            array_push($transformedMessages, [
                'message' => $message,
                'author' => $message->author,
                'room' => $message->room,
                'timestamp' => $message->created_at,
            ]);
        }

        JSGlobals::set('rawChatMessages', $transformedMessages);
        JSGlobals::set('author', Auth::user()->username);

        $view->with('messages', $transformedMessages);
    }

}
