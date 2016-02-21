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
            'name' => 'required',
        ]);

        $room = Room::create($request->except('_token'));
        return redirect(route('room.show', ['room' => $room->name]));
    }

    public function show(Request $request, $roomName)
    {
        return Room::where('name', $roomName)->first();
    }
}
