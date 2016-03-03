<?php

namespace App\Http\Controllers;

use DB;
use Auth;
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
        $room = Room::where('name', $roomName)->firstOrFail();
        return view('room.show', compact('room'));
    }

    public function emit(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->firstOrFail();
        event(new ChatMessage($room, 'hello world'));
    }

    public function invite(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->firstOrFail();
        $user = User::findByIdentifier($request->input('identifier'));

        if (is_null($user)) {
            return redirect()->back()->with('warning', 'User not found');
        }

        if ($room->inviteUser($user)) {
            return redirect()->back()->with('success', 'User has been invited');
        }

        return redirect()->back()->with('warning', 'User could not be invited');
    }

    public function join(Request $request, $token)
    {
        return 'Join with ' . $token;
    }
}
