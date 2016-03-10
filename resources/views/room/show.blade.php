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

    @include('room.partials.chat')
@endsection
