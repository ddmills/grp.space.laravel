@extends('layouts.master')

@section('page.header')
    <header class="page-header">
        <div class="container">
            <h2 class='page-title'>
                Rooms ({{ $rooms->total() }})
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>owner</th>
                <th>members</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>
                        <a href="{{ route('room.show', ['room' => $room->name]) }}">
                            {{ $room->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('user.show', ['room' => $room->owner->username]) }}">
                            {{ $room->owner->username }}
                        </a>
                    </td>
                    <td>
                        {{ $room->members->count() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="btn-group">
        @if ($rooms->previousPageUrl())
            <a class="btn btn-default" href="{{ $rooms->previousPageUrl() }}">
                <<
            </a>
        @else
            <a class="btn btn-default disabled" href="#">
                <<
            </a>
        @endif

        @if ($rooms->hasMorePages())
            <a class="btn btn-default" href="{{ $rooms->nextPageUrl() }}">
                >>
            </a>
        @else
            <a class="btn btn-default disabled" href="#">
                >>
            </a>
        @endif
    </div>

@endsection
