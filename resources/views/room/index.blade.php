@extends('layouts.master')

@section('subheader')
    <h2 class='app-subheader-title'>
        Room Index
    </h2>
@endsection

@section('content')
    @foreach ($rooms as $room)
        <p>
            {{ $room->id }} &middot;
            <a href="{{ route('room.show', ['room' => $room->name]) }}">
                {{ $room->name }}
            </a>
        </p>
    @endforeach
    {!! $rooms->render() !!}
@endsection
