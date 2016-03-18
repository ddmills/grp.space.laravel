@extends('layouts.room')

@section('page.title')
    {{ $room->name }}
@endsection

@section('page.actions')
    @can('administer', $room)
        {{-- <a href="{{ route('room.settings', $room->name) }}" class="btn btn-default">
            <i class="icon-cogs"></i> Room settings
        </a> --}}
    @endcan
@endsection

@section('content')
    <p class='lead'>
        {{ $room->description }}
    </p>
    @can('chat', $room)
        @include('room.partials.chat')
    @else
        <p><i class="icon-lock-alt"></i> You must be a member of this room in order to see the chat</p>
    @endcan
@endsection
