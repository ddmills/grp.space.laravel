<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function create()
    {
        return view('room.create');
    }

    public function store(Request $request)
    {
        $roomName = $request->get('name');
        return redirect(route('room.show', ['room' => $roomName]));
    }

    public function show(Request $request, $roomName)
    {
        return $roomName;
    }
}
