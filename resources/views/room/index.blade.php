@extends('layouts.master')

@section('page.header')
    <header class="page-header">
        <div class="container">
            <h2 class='page-title'>
                Room Index
            </h2>
        </div>
    </header>
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
