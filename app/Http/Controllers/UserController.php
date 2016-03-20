<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('user-view-all');

        $users = User::paginate(15);

        return view('user.index', compact('users'));
    }

    public function show(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $this->authorize('view', $user);
        return view('user.show', compact('user'));
    }

    public function dashboard(Request $request, $username)
    {
        $this->authorize('room-view-owned');

        $user = User::where('username', $username)->firstOrFail();

        $this->authorize('viewDashboard', $user);

        $rooms = $user->rooms;
        $followingRooms = $user->following;
        $roomInvites = $user->getNotifications('room.invite');

        return view('user.dashboard', compact('user', 'rooms', 'followingRooms', 'roomInvites'));
    }
}
