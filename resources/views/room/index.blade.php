@extends('layouts.master')


@section('content')

    <header class="page-header">
        <h2 class='page-title'>
            Room Index
        </h2>
    </header>

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
