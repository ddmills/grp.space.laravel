@extends('layouts.master')

@section('page.header')
    <header class='page-header'>
        <div class='container'>
            <h2 class="page-title">
                @if ($user->hasRole('admin'))
                    <i class="icon-crown"></i>
                @else
                    <i class="icon-user"></i>
                @endif
                {{ $user->username}}
            </h2>
            <div class="page-actions btn-group btn-group-sm">
                <a href="{{ route('user.show', $user->username) }}" class="btn btn-default">
                    <i class="icon-eye"></i> Public profile
                </a>
                @if (Auth::user()->id == $user->id)
                    <a href="{{ route('auth.logout') }}" class="btn btn-default">
                        <i class="icon-logout"></i> Sign out
                    </a>
                @endif
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="row">
        <div class="column one-fourth">
            <div class="user-image">
                <img src="http://lorempixel.com/155/155/abstract" width="155" height="155">
            </div>
            <h4 class="user-name">{{ $user->name }}</h4>
            <p class="user-username">{{ $user->username}}</h4>
            <p>{{ $user->created_at }}</p>
        </div>
        <div class="column three-fourths">
            <div class="panel">
                <div class="panel-header">
                    <h4 class="panel-title">
                        <i class="icon-bookmarks"></i>
                        Rooms
                    </h4>
                </div>
                <div class="panel-body">
                    <p><strong>Rooms you own</strong></p>
                    <ul>
                        @forelse ($rooms as $room)
                            <li>
                                {{ $room->id }} &middot;
                                <a href="{{ route('room.show', ['room' => $room->name]) }}">
                                    {{ $room->name }}
                                </a>
                            </li>
                        @empty
                            <li>You don't own any rooms</li>
                        @endforelse
                    </ul>
                    <p><strong>Rooms you're a member of</strong></p>
                    <ul>
                        @forelse ($followingRooms as $room)
                            <li>
                                {{ $room->id }} &middot;
                                <a href="{{ route('room.show', ['room' => $room->name]) }}">
                                    {{ $room->name }}
                                </a>
                            </li>
                        @empty
                            <li>You're not a member of any rooms</li>
                        @endforelse
                    </ul>
                    <a href="{{ route('room.create') }}" class="btn btn-sm btn-primary">
                        <i class="icon-plus"></i>
                        Create new room
                    </a>
                </div>
            </div>
            <br>
            <div class="panel">
                <div class="panel-header">
                    <h4 class="panel-title">
                        <i class="icon-bell"></i>
                        Room Invitations
                    </h4>
                </div>
                <div class="panel-body">
                    <ul>
                    @forelse ($roomInvites as $invite)
                        <li>
                            {{ $invite['data']['invitedby'] }} invited you to join {{ $invite['data']['room'] }}.
                            <a href="{{ route('room.join', ['token' => $invite['data']['token']]) }}">Join</a>.
                        </li>
                    @empty
                        <li>You have no outstanding room invitations</li>
                    @endforelse
                    </ul>
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="icon-minus-circled"></i>
                        Decline all invitations
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
