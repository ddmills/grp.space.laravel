@extends('layouts.room')

@section('page.title')
    {{ $room->name }}
@endsection

@section('page.actions')
    <a href="{{ route('room.show', $room->name) }}" class="btn btn-default">
        <i class="icon-home"></i> View room
    </a>
    <a href="{{ route('room.show', $room->name) }}" class="btn btn-danger">
        <i class="icon-times"></i> Delete room
    </a>
@endsection

@section('content')
    @include('other.steps', ['actions' => false])
    @include('room.partials.members')
@endsection
