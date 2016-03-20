<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Lang;
use Validator;
use App\Models\User;
use App\Models\Room;
use App\Models\Message;
use App\Events\ChatMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RoomController extends Controller
{
    public function index()
    {
        $this->authorize('user-view-all');

        $rooms = Room::paginate(15);

        return view('room.index', compact('rooms'));
    }

    public function create()
    {
        $this->authorize('room-create');

        return view('room.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|unique:rooms|roomname',
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('room-create');

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $room = Room::create($request->except('_token'));
        $room->setOwner(Auth::user());

        return redirect(route('room.show', ['room' => $room->name]))
            ->with('success', 'Welcome to your new room!');
    }

    public function show(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->first();

        $this->authorize('view', $room);

        return view('room.show', compact('room'));
    }

    public function settings(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->first();

        $this->authorize('administer', $room);

        return view('room.settings.index', compact('room'));
    }

    public function directory(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->first();

        $this->authorize('view', $room);

        return view('room.directory', compact('room'));
    }

    public function chat(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->firstOrFail();

        $this->authorize('chat', $room);

        $content = $request->input('message');
        $author = Auth::user();

        $message = Message::create(['content' => $content]);
        $message->author()->associate($author);
        $message->room()->associate($room);
        $message->save();

        event(new ChatMessage($message));
    }

    public function invite(Request $request, $roomName)
    {
        $identifier = $request->input('identifier');
        $room = Room::where('name', $roomName)->first();

        $this->authorize('invite', $room);

        $user = User::findByIdentifier($identifier);

        if ($room->members->contains($user)) {
            return redirect()
                ->back()
                ->with('warning', Lang::get('room.invite.failure', ['username' => $user->username]));
        }

        if (is_null($user)) {
            return redirect()
                ->back()
                ->with('warning', Lang::get('room.invite.notfound', ['identifier' => $identifier]));
        }

        if ($room->inviteUser($user)) {
            return redirect()
                ->back()
                ->with('success', Lang::get('room.invite.success', ['username' => $user->username]));
        }

        return redirect()
            ->back()
            ->with('warning', Lang::get('room.invite.failure', ['username' => $user->username]));
    }

    public function join(Request $request, $token)
    {
        $user = Auth::user();

        $notifications = $user->getNotifications('room.invite');

        foreach ($notifications as $notification) {
            if (strcmp($notification['data']['token'], $token) == 0) {
                $roomId = $notification['data']['roomid'];

                $room = Room::findOrFail($roomId);
                $room->addMember($user);

                return redirect(route('room.show', $room->name))
                    ->with('success', Lang::get('room.joined.success', [
                        'room' => $room->name
                    ]));
            }
        }

        return redirect()
            ->back()
            ->with('danger', Lang::get('room.join.failure'));
    }
}
