@extends('layouts.master')

@section('page.header')
    <header class='page-header'>
        <div class='container'>
            <h2 class="page-title">
                <i class="fa fa-fw fa-user"></i> {{ $user->username}}
            </h2>
            <div class="page-actions btn-group btn-group-sm">
                <a href="#" class="btn btn-default">
                    <i class="fa fa-fw fa-gears"></i> Settings
                </a>
                <a href="{{ route('auth.logout') }}" class="btn btn-default">
                    <i class="fa fa-fw fa-sign-out"></i> Sign out
                </a>
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
                        <i class="fa fa-fw fa-tree"></i>
                        Rooms
                    </h4>
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
                    <a href="{{ route('room.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-fw fa-plus"></i>
                        Create new room
                    </a>
                </div>
            </div>
            <br>
            <div class="panel">
                <div class="panel-header">
                    <h4 class="panel-title">
                        <i class="fa fa-fw fa-leaf"></i>
                        Room Invitations
                    </h4>
                </div>
                <div class="panel-body">
                    <ul>
                    @foreach ($roomInvites as $invite)
                        <li>
                            {{ $invite['data']['invitedby'] }} invited you to join {{ $invite['data']['room'] }}.
                            <a href="{{ route('room.join', ['token' => $invite['data']['token']]) }}">Join</a>.
                        </li>
                    @endforeach
                    </ul>
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="fa fa-fw fa-minus-circle"></i>
                        Decline all invitations
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
