<?php

namespace App\Http\Controllers;

use App\Room;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function create()
    {
        return view('room.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:rooms|roomname',
        ]);

        $room = Room::create($request->except('_token'));
        return redirect(route('room.show', ['room' => $room->name]));
    }

    public function show(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->firstOrFail();
        return view('room.show', compact('room'));
    }
}
