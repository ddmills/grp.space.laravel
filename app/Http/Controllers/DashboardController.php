<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request, $username)
    {
        $this->authorize('room-view-owned');

        $user = User::where('username', $username)->firstOrFail();
        $rooms = $user->rooms;
        $roomInvites = $user->getNotifications('room.invite');

        return view('dashboard.index', compact('user', 'rooms', 'roomInvites'));
    }
}
