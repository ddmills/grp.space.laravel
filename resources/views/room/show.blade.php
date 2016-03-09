@extends('layouts.master')

@section('page.header')
    <header class='page-header'>
        <div class='container'>
            <h2 class="page-title">
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
