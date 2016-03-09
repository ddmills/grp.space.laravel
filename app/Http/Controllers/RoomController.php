<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Lang;
use App\User;
use App\Room;
use Validator;
use App\Http\Requests;
use App\Events\ChatMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::where('access', 'public')->simplePaginate(15);
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
        $this->authorize('room-invite');
        $room = Room::where('name', $roomName)->firstOrFail();
        return view('room.show', compact('room'));
    }

    public function settings(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->firstOrFail();
        $this->authorize('administer', $room);
        return 'SETTINGS FOR ' . $room->name;
    }

    public function emit(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->firstOrFail();
        event(new ChatMessage($room, 'hello world'));
    }

    public function invite(Request $request, $roomName)
    {
        $identifier = $request->input('identifier');
        $room = Room::where('name', $roomName)->firstOrFail();
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
