@extends('layouts.room')

@section('page.title')
    {{ $room->name }}
@endsection

@section('page.actions')
    @can('administer', $room)
        <a href="{{ route('room.settings', $room->name) }}" class="btn btn-default">
            <i class="fa fa-fw fa-gears"></i> Room settings
        </a>
    @endcan
@endsection

@section('content')
    <p class='lead'>
        {{ $room->description }}
    </p>

    <div class="panel">
        <div class="panel-header">
            <h4 class="panel-title">
                <i class="fa fa-fw fa-comments"></i> Chat
            </h4>
        </div>
        <div class="panel-body">
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
    </div>

@endsection
