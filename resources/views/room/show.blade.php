@extends('layouts.master')

@section('page.header')
    <header class='page-header'>
        <div class='container'>
            <h2 class="page-title">
                @if($room->access == 'public')
                    <i class="fa fa-fw fa-eye" title="This room is public"></i>
                @elseif($room->access == 'private')
                    <i class="fa fa-fw fa-lock" title="This room is private"></i>
                @endif
                {{ $room->name }}
            </h2>
            <div class="page-actions btn-group btn-group-sm">
                @can('administer', $room)
                    <a href="{{ route('room.settings', $room->name) }}" class="btn btn-default">
                        <i class="fa fa-fw fa-gears"></i> Room settings
                    </a>
                @endcan
            </div>
        </div>
        <div class='container'>
            <p class='page-lead'>
                {{ $room->description }}
            </p>
        </div>
    </header>
@endsection

@section('content')

    <p>
        Welcome 2 the {{ $room->access }} dank room. Owned by
        <a href="{{ route('dashboard.index', $room->owner->username) }}">
            {{ $room->owner->username }}
        </a>.
    </p>

    @can('invite', $room)
        <form action="{{ route('room.invite', ['room' => $room->name]) }}" method="post" accept-charset="utf-8">

            {{ csrf_field() }}

            <div class="row">
                <div class='column four-fifths'>
                    <div class='form-group'>
                        <input type="text" class="form-control" id="input-identifier" name="identifier" value="{{ old('identifier') }}" placeholder="Username or email">
                    </div>
                </div>

                <div class='column one-fifth'>
                    <button type="submit" class="btn btn-block btn-primary">
                        Invite user
                    </button>
                </div>
            </div>

        </form>
    @endcan

    <div>
        <h3>Chat</h3>
        <ul id='chat-messages'></ul>
        <div class='row'>
            <div class='column four-fifths'>
                <input type='text' class='form-control' id='chat-message'>
            </div>
            <div class='column one-fifth'>
                <button type='button' class='btn btn-block btn-primary'>send</button>
            </div>
        </div>
    </div>

@endsection
