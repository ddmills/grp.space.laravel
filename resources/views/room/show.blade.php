@extends('layouts.master')


@section('content')
    <header class="page-header">
        <h2 class="page-title">
            {{ $room->name }}
            @if($room->access == 'public')
                <i class="fa fa-fw fa-eye pull-right" title="This room is public"></i>
            @elseif($room->access == 'private')
                <i class="fa fa-fw fa-lock pull-right" title="This room is private"></i>
            @endif
        </h2>
        <p class='page-lead'>{{ $room->description }}</p>
    </header>

    <p>Welcome 2 the {{ $room->access }} dank room</p>

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
