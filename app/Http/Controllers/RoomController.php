<?php

namespace App\Http\Controllers;

use DB;
use App\Room;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::where('access', 'public')->simplePaginate(15);
        return view('room.index', compact('rooms'));
    }

    public function create()
    {
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
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $room = Room::create($request->except('_token'));
        return redirect(route('room.show', ['room' => $room->name]))->with('success', 'Welcome to your new room!');
    }

    public function show(Request $request, $roomName)
    {
        $room = Room::where('name', $roomName)->firstOrFail();
        return view('room.show', compact('room'));
    }
}
