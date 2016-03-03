@extends('layouts.master')

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
                    Rooms
                    <a href="{{ route('room.create') }}" class="btn btn-sm btn-primary pull-right">
                        Create new room
                    </a>
                </div>
                <div class="panel-body">
                    <ul>
                    @foreach ($rooms as $room)
                        <li>
                            {{ $room->id }} &middot;
                            <a href="{{ route('room.show', ['room' => $room->name]) }}">
                                {{ $room->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                </div>
            </div>
            <br>
            <div class="panel">
                <div class="panel-header">
                    Room Invitations
                </div>
                <div class="panel-body">
                    <ul>
                    @foreach ($roomInvites as $invite)
                        <li>
                            {{ $invite['data']['invitedby'] }} you to join {{ $invite['data']['room'] }}.
                            <a href="{{ route('room.join', ['token' => $invite['data']['token']]) }}">Join</a>.
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
