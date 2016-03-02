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

    <div>
        <h3>Chat</h3>
        <ul id='chat-messages'></ul>
        <div class='columns'>
            <div class='column four-fifths'>
                <input type='text' class='form-control' id='chat-message'>
            </div>
            <div class='column one-fifth'>
                <button type='button' class='btn btn-block btn-primary btn-sm'>send</button>
            </div>
        </div>
    </div>

@endsection
