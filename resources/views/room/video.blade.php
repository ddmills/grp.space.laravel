@extends('layouts.room')

@section('page.title')
    {{ $room->name }}
@endsection

@section('content')

    @can('chat', $room)
        @include('room.partials.video')
    @else
        <p><i class="icon-lock-alt"></i> You must be a member of this room in order to see the video</p>
    @endcan

@endsection
