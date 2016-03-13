<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('user-view-all');
        $users = User::simplePaginate(15);
        return view('user.index', compact('users'));
    }

    public function show(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $this->authorize('view', $user);
        return view('user.show', compact('user'));
    }
}
